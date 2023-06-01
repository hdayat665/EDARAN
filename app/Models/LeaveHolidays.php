<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveHolidays extends Model
{
    use HasFactory;

    protected $table = 'leave_holiday';

    protected $guarded = [];
}