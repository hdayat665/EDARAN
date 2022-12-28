<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class EclaimGeneral extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'eclaim_general';

    protected $guarded = [];
}