<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class MtcAttachment extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'mtc_attachment';

    protected $guarded = [];
}