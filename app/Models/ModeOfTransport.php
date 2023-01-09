<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModeOfTransport extends Model
{
    use HasFactory;

    protected $table = 'mode_of_transport';

    protected $guarded = [];
}