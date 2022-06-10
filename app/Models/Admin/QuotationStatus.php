<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationStatus extends Model
{
    use HasFactory;

    protected $table = 'quotation_status';
    
    protected $fillable = [
        'name',
        'code',	
        'value',	
        'description',
    ];
}
