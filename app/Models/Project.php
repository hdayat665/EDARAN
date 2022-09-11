<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Project extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'project';

    protected $fillable = [
        'LOA_date',
        'desc',
        'tenant_id',
        'customer_id',
        'project_code',
        'reason',
        'status_request',
        'requested_date',
        'employee_name',
        'project_name',
        'acc_manager',
        'contract_value',
        'contract_type',
        'contract_start_date',
        'contract_end_date',
        'financial_year',
        'project_manager',
        'warranty_start_date',
        'warranty_end_date',
        'bank_guarantee_acc',
        'bank_guarantee_expiry_date',
        'status'
    ];

    public function Customer()
    {
        $this->belongsTo(Customer::class, 'id', 'customer_id');
    }
}
