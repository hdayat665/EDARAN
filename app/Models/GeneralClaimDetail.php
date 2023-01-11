<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralClaimDetail extends Model
{
    use HasFactory;

    protected $table = 'general_claim_details';

    protected $guarded = [];

    public function claim_category_content()
    {
        return $this->belongsTo(ClaimCategoryContent::class, 'claim_category_detail', 'id');
    }
}