<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CashAdvanceDetail extends Model
{
    use HasFactory;

    protected $table = 'cash_advance_detail';

    protected $guarded = [];

    public function mode_of_transport()
    {
        return $this->belongsTo(ModeOfTransport::class, 'id', 'cash_advance_id');
    }
}