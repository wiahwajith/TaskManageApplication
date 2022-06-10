<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table="product";
    protected $fillable= [
        'code',
        'name',
        'description',
        'cost',
        'quotation_id',
        'assigner_id',
        'product_type_id',
        'valid_date',
    ];


    //relation 
    public function quotation()
    {
        return $this->hasOne('App\Models\Quotation','id','quotation_id');
    }
    public function productType()
    {
        return $this->hasOne('App\Models\Admin\ProductType','id','product_type_id');
    }
    public function assigner()
    {
        return $this->hasOne('App\Models\User','id','assigner_id');
    }

    //model function

    public function format()
    {
        return [
            'code'=> $this->code,
            'name'=> $this->name,
            'description'=> $this->description,
            'quotation_id'=> $this->quotation_id,
            'assigner_id'=> $this->assigner_id,
            'product_type_id'=> $this->product_type_id,
            'valid_date'=> $this->valid_date,
        ];
    }
}
