<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AppealMtc extends Model

{

    protected $table = 'appeal_mtc';

    protected $guarded = [];

    public function GeneralClaim()
    {
        return $this->belongsTo(GeneralClaim::class, 'id', 'general_id');
    }

    public function userProfile()
    {
        return $this->belongsTo(UserProfile::class, 'user_id', 'user_id');
    }
}