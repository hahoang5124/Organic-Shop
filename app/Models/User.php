<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function  scopeupdateUserToken($query, $token, $email)
    {
       return $query->where('email', $email)->update([
        'token_reset_password' => $token,
        'reset_token_expires_at' => now()->setTimezone('Asia/Ho_Chi_Minh')->addMinutes(5)
        ]);
    }
    public function  scopechangeUserPassword($query, $token, $password)
    {
       return $query->where('token_reset_password', $token)->update([
        'password' => $password
        ]);
    }
    public function  scopegetUserByToken($query, $token)
    {
       return $query->select('reset_token_expires_at',)->where('token_reset_password', $token);
    }
}
