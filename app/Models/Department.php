<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Department extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table ='department';

    protected $fillable = [
        'companyId',
        'departmentCode',
        'departmentName',
        'addedBy',
        'modifiedBy',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'companyId', 'id');
    }

    public function unit()
    {
        return $this->hasMany(Unit::class, 'departmentId', 'id');
    }
}


