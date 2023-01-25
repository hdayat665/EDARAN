<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelClaim extends Model
{
    use HasFactory;

    protected $table = 'travel_claim';

    protected $guarded = [];
}