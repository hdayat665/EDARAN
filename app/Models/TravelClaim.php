<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TravelClaim extends Model
{
    use HasFactory;

    protected $table = 'travel_claim';

    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    public function claimCategory()
    {
        return $this->belongsTo(ClaimCategory::class, 'category_id', 'id');
    }
    public function GeneralClaim()
    {
        return $this->belongsTo(GeneralClaim::class, 'id', 'general_id');
    }
    
}