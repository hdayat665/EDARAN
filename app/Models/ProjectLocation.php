<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ProjectLocation extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'project_location';

    protected $fillable = [
        'project_id',
        'tenant_id',
        'customer_id',
        'location_name',
        'address',
        'address2',
        'postcode',
        'city',
        'state',
        'country',
        'location_google',
        'latitude',
        'longitude',
        
    ];
}
