<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atentendance extends Model
{
    use HasFactory;
    protected $table = 'attendance';
    protected $fillable = [
        'user_id',
        'type',
    ];
}
