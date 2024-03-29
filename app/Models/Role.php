<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Role extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'role';

    // protected $fillable = [
    //     'roleName',
    //     'tenant_id',
    //     'addedBy',
    //     'addedTime',
    //     'modifiedBy',
    //     'modifiedTime',
    // ];

    protected $guarded = [];

    public function permissions()
    {
        return $this->hasMany(PermissionRole::class, 'role_id', 'id');
    }
}