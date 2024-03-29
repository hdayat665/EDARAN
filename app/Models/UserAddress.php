<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserAddress extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table ='useraddress';

    protected $fillable = [
        'user_id',
        'address1',
        'address2',
        'postcode',
        'city',
        'state',
        'country',
        'address1c',
        'address2c',
        'postcodec',
        'cityc',
        'statec',
        'countryc',
        'addressType',
    ];
}


