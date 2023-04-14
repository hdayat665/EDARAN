<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppealTimesheets extends Model
{
    use HasFactory;

    protected $table = 'appeal_timesheet';

    protected $guarded = [];
}
