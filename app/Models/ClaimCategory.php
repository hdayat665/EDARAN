<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaimCategory extends Model
{
    use HasFactory;

    protected $table = 'claim_category';

    protected $guarded = [];
}