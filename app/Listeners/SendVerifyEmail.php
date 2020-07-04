<?php

namespace App\Listeners;

use App\Notifications\VerifyMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class SendVerifyEmail
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if ($event->user instanceof MustVerifyEmail && $event->user->hasVerifiedEmail()) {
            $token = $event->user->verify_token;
            $event->user->notify(new VerifyMail($token));
        }
    }
}
