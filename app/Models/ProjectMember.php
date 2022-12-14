<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ProjectMember extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'project_member';

    protected $fillable = [
        'project_id',
        'customer_id',
        'tenant_id',
        'location_id',
        'employee_id',
        'member_name',
        'designation',
        'department',
        'location',
        'exit_project',
        'requested_date',
        'exit_project_date',
        'branch',
        'unit',
        'status',
        'reason',
        'assign_as',
        'joined_date',
    ];
}
