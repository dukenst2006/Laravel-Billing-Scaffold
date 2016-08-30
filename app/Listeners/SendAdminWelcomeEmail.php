<?php

namespace App\Listeners;

use App\Events\AdminRegistered;
use App\Mail\SendWelcomeEmailAdminRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendAdminWelcomeEmail
{ 
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(AdminRegistered $event)
    {
        Mail::to($event->user)->send(new SendWelcomeEmailAdminRegistered($event->user));
    }
}
