<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;

    protected $table = "product_type";
    protected $fillable = [
        'name',
        'code',	
        'value',	
        'description',
    ];
}
