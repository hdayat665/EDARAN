<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserCompanion extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table ='userCompanion';

    protected $fillable = [
        'user_id',
        'mainCompanion',
        'firstName',
        'lastName',
        'fullName',
        'nonNetizen',
        'idNo',
        'oldIDNo',
        'nonCitizen',
        'passport',
        'expiryDate',
        'issuingCountry',
        'contactNo',
        'DOB',
        'age',
        'DOM',
        'marrigeCert',
        'address1',
        'address2',
        'postcode',
        'city',
        'state',
        'country',
        'address1E',
        'address2E',
        'postcodeE',
        'cityE',
        'stateE',
        'countryE',
        'working',
        'employment',
        'companyName',
        'incomeTax',
        'salary',
        'officeNo',
        'idFile',
        'okuStatus',
        'okuNumber',
        'okuID',
        'homeNo',
        'sameAsPermanent',
        'designation',
        'dateJoined',
    ];
}


