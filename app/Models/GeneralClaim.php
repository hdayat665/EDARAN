<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GeneralClaim extends Model
{
    use HasFactory;

    protected $table = 'general_claim';

    protected $guarded = [];

    public function userProfile()
    {
        return $this->belongsTo(UserProfile::class, 'user_id', 'user_id');
    }
    public function TravelClaim()
    {
        return $this->belongsTo(TravelClaim::class, 'id', 'general_id');
    }

    public function Department()
    {
        return $this->belongsTo(Department::class, 'id', 'general_id');
    }
}