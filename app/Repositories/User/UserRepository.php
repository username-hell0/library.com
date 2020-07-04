<?php

namespace App\Repositories\User;

use App\Model\User\User;

class UserRepository
{
    public function searchUser($column, $type, $search, $status)
    {
        $users = User::where(function ($query) use ($search) {
            $query->where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%");
        })
            ->where(function ($query) use ($status) {
                if ($status == 'all') {
                    $query->where('status', '<>', $status);
                } else {
                    $query->where('status', '=', $status);
                }
            });

        return $users->orderBy($column, $type)->paginate(15);
    }
}
