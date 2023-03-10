<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserRole extends Model
{
    use HasFactory;

    protected $table = 'role_user';

    protected $guarded = [];

    public function userProfile()
    {
        return $this->belongsTo(UserProfile::class, 'up_user_id', 'user_id');
    }
}
