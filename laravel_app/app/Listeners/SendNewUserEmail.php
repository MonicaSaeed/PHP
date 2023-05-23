<?php

namespace App\Listeners;

use App\Events\NewUserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
use App\Mail\DemoMail;

class SendNewUserEmail implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }
    public function handle(\App\Events\NewUserRegistered $event)
    {
        $mailData = [
            'title' => 'New registered user',
            'body' => 'A new user has registered to the system',
        ];

        Mail::to('laraveltest82@gmail.com')->send(new DemoMail($mailData));
    }
    /**
     * Handle the event.
     */
    //public function handle(NewUserRegistered $event): void
    //{
        //
    //}
}
