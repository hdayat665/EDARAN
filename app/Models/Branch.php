<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Branch extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table ='branch';

    protected $fillable = [
        'unitName',
        'unitId',
        'branchName',
        'branchType',
        'state',
        'addedBy',
        'modifiedBy',
    ];

    public function unit()
    {
        $this->belongsTo(Unit::class, 'id', 'unitId');
    }
}


