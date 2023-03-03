<?php

namespace App\Http\Controllers\Product;

use App\DataTables\ProductsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function addProducting(ProductRequest $request)
    {
        $product = $this->productRepository->addProduct($request);
        if ($product) {
            return redirect()->route("get.Dashboard")->with(['success' => __('messages.product.added')]);
        } else {
            return back()->with('error', __('messages.product.imageFormat'));
        }
    }

    public function getAllProducts(ProductsDataTable $productDataTable)
    {
        return $productDataTable->render('dashboard.dashboard');
    }
}
