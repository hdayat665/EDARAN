<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuPermissionCode extends Model
{
    use HasFactory;

    protected $table = 'menu_permission_code';
    protected $guarded = [];
}
