<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ProductsInterface;
use App\Models\Product;

class ProductsRepo implements ProductsInterface
{
    public function getAllWithCategory()
    {
        return Product::with([
            'category',
            'images'
        ])->get();
    }
}
