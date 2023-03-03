<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\Product\ProductRequest;
use Illuminate\Http\Request;

interface ProductRepositoryInterface
{
    public function addProduct(ProductRequest $request);
    public function deleteProduct(Request $request);
}
