<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Unit extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table ='unit';

    protected $fillable = [
        'departmentId',
        'tenant_id',
        'unitCode',
        'unitName',
        'addedBy',
        'modifiedBy',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'id', 'departmentId');
    }


    public function branch()
    {
        return $this->hasMany(Branch::class, 'id', 'unitId');
    }
}


