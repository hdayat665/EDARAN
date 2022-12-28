<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Awobaz\Compoships\Compoships;

class DomainList extends Model
{
    use HasFactory, Compoships;

    protected $table = 'domain_list';

    protected $guarded = [];

    public function jobGrade()
    {
        return $this->belongsTo(JobGrade::class, ['role', 'checker1'], ['id', 'id']);
    }
}