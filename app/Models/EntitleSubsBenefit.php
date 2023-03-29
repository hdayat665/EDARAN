<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntitleSubsBenefit extends Model
{
    use HasFactory;

    protected $table = 'entitle_subs_benefit';

    protected $guarded = [];

    public function EntitleGroup()
    {
        return $this->belongsTo(EntitleGroup::class, 'entitle_id', 'id');
    }
}