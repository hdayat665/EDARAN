<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class JobHistory extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table ='jobHistory';

    protected $fillable = [
        'role',
        'user_id',
        'tenant_id',
        'employmentDetail',
        'effectiveDate',
        'event',
        'updatedBy',
        'remarks',
        'roleHistory',
        'companyHistory',
        'departmentHistory',
        'unitHistory',
        'branchHistory',
        'joinedDateHistory',
        'jobGradeHistory',
        'designationHistory',
        'employmentTypeHistory',
        'supervisorHistory',
        'CORHistory',
        'statusHistory',
    ];
}


