<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class Api extends Controller
{
    //send month and day to getData function
    public function getActorsIDs(Request $request){
        $month = $request->month;
        $day = $request->day;

        $response = Http::withHeaders([
            'X-RapidAPI-Host' => 'online-movie-database.p.rapidapi.com',
            'X-RapidAPI-Key' => 'ff9ad4eff4msh62baa05a18ead0fp13c5bdjsndac8cb4a1464'
        ])->get('https://online-movie-database.p.rapidapi.com/actors/list-born-today?month='.$month.'&day='.$day);
        $actorsIDs = array();
        foreach($response->json() as $actor){
            //get actor's id
            $ids=explode('/', $actor);
            array_push($actorsIDs, $ids[2]);
        }
    
        return $actorsIDs;
    }

    public function getActorsName(Request $req){
        $IDs=$this->getActorsIDs($req);
        $res = array();
        foreach($IDs as $id){
            $response = Http::withHeaders([
                'X-RapidAPI-Host' => 'online-movie-database.p.rapidapi.com',
                'X-RapidAPI-Key' => 'ff9ad4eff4msh62baa05a18ead0fp13c5bdjsndac8cb4a1464'
            ])->get('https://online-movie-database.p.rapidapi.com/actors/get-bio?nconst='.$id);
            $actor = $response->json();
            array_push($res, $actor['name']);
        }
        return $res;
    }
    
}

