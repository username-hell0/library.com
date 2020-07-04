<?php

namespace App\Services\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Model\User\User;
use Illuminate\Auth\Events\Registered;

class RegisterService
{
    public function register(RegisterRequest $request)
    {
        $user = User::createUser($request->all());

        event(new Registered($user));
    }
}
