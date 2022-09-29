<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TimesheetEvent extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'timesheet_event';

    protected $fillable = [
       'project_id',
       'tenant_id',
       'user_id',
       'event_name',
       'start_date',
       'end_date',
       'start_time',
       'end_time',
       'duration',
       'type_recurring',
       'set_reccuring_date_month',
       'set_reccuring_week_month',
       'set_reccuring_month_yearly2',
       'set_reccuring_date_yearly',
       'set_reccuring_week_yearly',
       'set_reccuring_day_yearly',
       'set_reccuring_yearly',
       'set_reccuring_month_yearly',
       'set_reccuring_day_month',
       'set_reccuring_month',
       'set_reccuring',
       'recurring',
       'all_day',
       'priority',
       'location',
       'participant',
       'desc',
       'reminder',
       'file_upload',
    ];
}
