<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'c_full_name',
        'c_phone',
        'c_email',
        'c_password',
        'date_of_birth',
        'gender',
        'c_address',
        'c_image',
        'email_verified_at',
        'phone_verified_at',
        'verification_code',
        'oauth_provider',
        'oauth_id',
        'status',
        'is_guest',
        'login_count',
        'total_spent',
    ];

    protected $hidden = [
        'c_password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
        'date_of_birth' => 'date',
        'total_spent' => 'decimal:2',
        'is_guest' => 'boolean',
        'status' => 'integer',
        'login_count' => 'integer',
        'c_password' => 'hashed',
    ];

    public function getAuthPassword()
    {
        return $this->c_password;
    }

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
