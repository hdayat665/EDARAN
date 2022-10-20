<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserEmergency extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table ='userEmergency';

    protected $fillable = [
        'user_id',
        'firstName',
        'lastName',
        'fullName',
        'contactNo',
        'relationship',
        'address1',
        'address2',
        'city',
        'postcode',
        'state',
        'country',
    ];
}


