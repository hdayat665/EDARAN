<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralClaim extends Model
{
    use HasFactory;

    protected $table = 'general_claim';

    protected $guarded = [];
}