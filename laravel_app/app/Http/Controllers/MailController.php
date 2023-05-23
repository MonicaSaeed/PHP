<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\DemoMail;

class MailController extends Controller
{
    public function index(Request $request)
    {
        $MailData =
        [
            'title'=>'New registered user',
            'body'=>'A new user '. $request->input('username') . ' is registered to the system',
        ];

        Mail::to('laraveltest82@gmail.com')->send(new DemoMail ($MailData));
        dd('Email sent successfully .');

    }
}
