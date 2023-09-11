<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TypeOfLogs extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table ='type_of_logs';

    protected $fillable = [
        'id',
        'project_id',
        'tenant_id',
        'activity_name',
        'department',
        'user_id',
        'type_of_log',
        'activity_id',
        'addedBy',
    ];

}


