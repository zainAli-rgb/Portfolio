<?php

namespace App\Services;

use App\Repositories\Interfaces\ProductsInterface;

class ProductsService
{
    protected $productsRepo;
    public function __construct(ProductsInterface $productsRepo)
    {
        $this->productsRepo = $productsRepo;
    }

    public function getHomeProductsGrouped()
    {
        $products = $this->productsRepo->getAllWithCategory();

        return $products->groupBy(function ($product) {
            return $product->category?->name ?? 'Uncategorized';
        });
    }


}
