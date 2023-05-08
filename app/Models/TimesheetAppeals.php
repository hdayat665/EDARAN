<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimesheetAppeals extends Model
{
    use HasFactory;

    protected $table = 'timesheet_appeal';

    protected $guarded = [];
}
