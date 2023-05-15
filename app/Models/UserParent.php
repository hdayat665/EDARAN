<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserParent extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table ='userParent';

    protected $fillable = [
        'user_id',
        'firstName',
        'lastName',
        'fullName',
        'nonCitizen',
        'idNo',
        'passport',
        'expiryDate',
        'issuingCountry',
        'contactNo',
        'DOB',
        'gender',
        'age',
        'relationship',
        'address1',
        'address2',
        'postcode',
        'city',
        'state',
        'country',
        'idFile',
        'okuFile',
        'oldIDNo',
        'okuCardNum',
    ];
}


