<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TimesheetLog extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'timesheet_log';

    protected $fillable = [
        'project_id',
        'tenant_id',
        'user_id',
        'type_of_log',
        'date',
        'office_log',
        'activity_name',
        'project_location',
        'start_time',
        'end_time',
        'desc',
        'total_hour',
        'lunch_break',
        'appealstatus',
    ];
}
