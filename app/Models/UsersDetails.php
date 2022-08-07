<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UsersDetails extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table ='users_details';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'domain',
        'company',
        'phone',
        'allocated_malaysia',
        'location',
        'terms',
        'user_id',
        'status',
    ];
}


