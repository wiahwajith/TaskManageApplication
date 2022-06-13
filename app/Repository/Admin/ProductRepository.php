<?php

namespace App\Repository\Admin;

use App\Models\Admin\Product;
use App\Models\Admin\ProductType;

class ProductRepository 
{
    public function getAllProductTypes()
    {
        $productTypes = ProductType::all();
        return $productTypes;
    }

    public function storeProduct($request)
    {

        $product = Product::create($request->all());

        return $product;
    }
 
}
