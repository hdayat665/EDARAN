<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaimCategoryContent extends Model
{
    use HasFactory;

    protected $table = 'claim_category_content';

    protected $guarded = [];
}