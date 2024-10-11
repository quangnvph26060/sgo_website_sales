<?php

namespace App\Listeners;

use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;
use App\Events\SendMailForgotPassword;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgotPassword implements ShouldQueue
{
    /**
     * Create the event listener.
     */

    public function __construct()
    {

    }

    /**
     * Handle the event.
     */
    public function handle(SendMailForgotPassword $event): void
    {
        Mail::to($event->user->email)->send(new ForgotPasswordMail($event->user, $event->newPass, $event->token));
    }
}
