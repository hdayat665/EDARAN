<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = 'location';

    protected $guarded = [];

    public function postcodebranches()
    {
        $this->hasMany(Branch::class, 'id', 'postcode');

    }

    public function countrybranches()
    {
        $this->hasMany(Branch::class, 'id', 'country');
    }
}
