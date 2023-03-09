<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EclaimGeneralSetting extends Model
{
    use HasFactory;

    protected $table = 'eclaim_setting_general';

    protected $guarded = [];
}