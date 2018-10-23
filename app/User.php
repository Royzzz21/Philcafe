<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPassword;
use Hash;

/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $role
 * @property string $remember_token
*/
class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['username','name', 'email', 'password', 'remember_token', 'role_id',
        'phone', 'gender', 'birthdate', 'profile_picture'
        ];

    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }


    /**
     * Set to null if empty
     * @param $input
     */
    public function setRoleIdAttribute($input)
    {
        $this->attributes['role_id'] = $input ? $input : null;
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }



    public function sendPasswordResetNotification($token)
    {
       $this->notify(new ResetPassword($token));
    }
    public function posts()
    {
        return $this->hasMany(Post::class, 'member_srl');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'member_srl');
    }

}
