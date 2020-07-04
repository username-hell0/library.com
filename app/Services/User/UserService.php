<?php

namespace App\Services\User;

use App\Http\Requests\User\UpdateUserRequest;
use App\Model\User\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * Method for update user.
     *
     * @param UpdateUserRequest $request
     * @param User $user
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->name = $request['name'];
        $user->email = $request['email'];

        if ($request['password']) {
            $user->password = Hash::make($request['password']);
        }

        $user->save();
    }
}
