<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\Product\ProductRequest;

interface ProductRepositoryInterface
{
    public function addProduct(ProductRequest $request);
}
