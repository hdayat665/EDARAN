<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EntitleGroup extends Model
{
    use HasFactory;

    protected $table = 'entitle_group';

    protected $guarded = [];

    public function TransportMillage()
    {
        return $this->belongsTo(TransportMillage::class, 'entitle_id', 'id');
    }
}