<?php

namespace App\Services\Auth;

use App\Model\User\User;
use App\Notifications\VerifyMail;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Str;

/**
 * Class VerifyService
 * @package App\Services\Auth
 *
 * Service for verify the email user.
 */
class VerifyService
{
    /**
     * @param $token
     * @return User
     *
     * We are looking for a user. Change status and delete verify_token.
     * If user not found throw DomainException.
     */
    public function verify($token)
    {
        $user = User::where('verify_token', $token)->first();

        if (!$user) {
            throw new \DomainException('Sorry your link cannot be identified.');
        }

        $user->verify();

        event(new Verified($user));

        return $user;
    }

    /**
     * @param $email
     *
     * We are looking for a user. Change verify_token.
     * Or his mail has already been verify then throw DomainException.
     */
    public function resend($email)
    {
        $user = User::where('email', $email)
            ->where('status', User::STATUS_WAIT)
            ->first();

        if (!$user) {
            throw new \DomainException('Email not found or already verify.');
        }

        $user->update([
            'verify_token' => Str::uuid(),
        ]);

        $user->notify(new VerifyMail($user->verify_token));
    }
}
