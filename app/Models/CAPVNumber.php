<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CAPVNumber extends Model
{
    use HasFactory;

    protected $table = 'ca_pv_number';

    protected $guarded = [];
}