<?php

namespace App\Model\User;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * Class User
 * @package App\Model\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $verify_token
 * @property string $status
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    public const STATUS_WAIT = 'wait';
    public const STATUS_ACTIVE = 'active';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'status', 'verify_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $timestamps = false;

    public function hasVerifiedEmail()
    {
        return $this->status === static::STATUS_WAIT;
    }

    public static function createUser($data)
    {
        return static::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => static::STATUS_WAIT,
            'verify_token' => Str::uuid(),
        ]);
    }

    public function verify()
    {
        static::update([
            'status' => static::STATUS_ACTIVE,
            'verify_token' => null,
        ]);
    }
}
