<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TimesheetApproval extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'timesheet_approval';

    protected $fillable = [
        'user_id',
        'employee_id',
        'month',
        'designation',
        'department',
        'employee_name',
        'tenant_id',
        'status',
        'log_id',
        'event_id',
        'amendreason',
    ];
}
