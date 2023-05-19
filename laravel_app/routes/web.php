<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormValidation;
use App\Http\Controllers\Api;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix', '{locale}'], function () {

    Route::get('/', function () {return view('/', 'Pages.welcome');})->middleware('setLocale');
});
Route::view('/', 'Pages.welcome') ;
Route::post('/index', [FormValidation::class,'checkErrors'])->name('checkErrors');
Route::view('/index', 'Pages.Index');
Route::view('/register', 'Pages.Index');
Route::get('/getActorsName',[Api::class,'getActorsName'])->name('getActorsName');
