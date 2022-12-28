<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntitleGroup extends Model
{
    use HasFactory;

    protected $table = 'entitle_group';

    protected $guarded = [];
}