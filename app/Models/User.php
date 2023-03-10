<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $connection = 'PROPERTY_MANAGEMENT_INVENTORY_CONNECTION';

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'firstname',
        'middlename',
        'lastname',
        'phonenumber',
        'role',
        'account_level',
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
    ];
    protected function role(): Attribute{
        return new Attribute(
            get: fn($value) => ["user","admin","superadmin"][$value],
        );
    }

    protected function fullname(): Attribute
    {
        return Attribute::make(
            get: fn ($value) =>  Str::upper($this->lastname) . ', ' . Str::upper($this->firstname) . ' ' . Str::upper($this->middlename)
        );
    }


}