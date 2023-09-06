<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomPermission extends Model
{
    use HasFactory;

    protected $table = 'custom_permissiion';

    protected $guarded = [];
}