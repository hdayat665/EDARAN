<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Branch extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table ='branch';

    protected $guarded = [];

    public function company()
    {
        $this->belongsTo(Company::class, 'id', 'companyId');

    }

    public function location()
    {
        $this->belongsTo(Location::class, 'id', 'postcode');

    }

    public function country()
    {
        $this->belongsTo(Location::class, 'countryID', 'country');
    }
}


