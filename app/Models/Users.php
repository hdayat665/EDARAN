<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Users extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    // use \Znck\Eloquent\Traits\BelongsToThrough;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';

    protected $guarded = [];

    public function userProfile()
    {
        return $this->belongsTo(UserProfile::class, 'id', 'user_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function employement()
    {
        return $this->belongsTo(Employee::class, 'id', 'user_id');
    }

    public function customRole()
    {
        return $this->belongsTo(CustomPermission::class, 'id', 'user_id');
    }

    // public function location()
    // {
    //     return $this->belongsToThrough(
    //         Location::class, // Target model
    //         User::class, // Intermediate model
    //         [
    //             Location::class => 'id',
    //             User::class => 'id'
    //         ], // Local key for intermediate model and target model
    //         '',
    //         [
    //             User::class => 'uid',
    //             Location::class => 'location_id',
    //         ] // Foreign key column on the target table and intermediate table
    //     );
    // }
}