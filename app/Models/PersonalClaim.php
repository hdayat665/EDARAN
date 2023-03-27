<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalClaim extends Model
{
    use HasFactory;
    protected $table = 'personal_claim';

    protected $guarded = [];
    
    public function claim_category_content()
    {
        return $this->belongsTo(ClaimCategoryContent::class, 'claim_category_detail', 'id');
    }
}