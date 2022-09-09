<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table ='customer';

    protected $fillable = [
        'status',
        'tenant_id',
        'customer_name',
        'address',
        'email',
        'phoneNo',
        'addedBy',
    ];

    public function project()
    {
        return $this->hasMany(Project::class, 'id', 'customer_id');
    }

}


