<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $table = 'location_states';

    protected $guarded = [];

    // public function locations()
    // {
    //     return $this->hasMany(Location::class);
    // }
}
