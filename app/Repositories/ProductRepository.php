<?php

namespace App\Repositories;

use App\Http\Requests\Product\ProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryInterface
{
    public function addProduct(ProductRequest $request)
    {
        try {
            DB::beginTransaction();
            $product = Product::create([
                'name' => $request->name,
                'title' => $request->title,
                'description' => $request->description,
                'base_price' => $request->base_price,
                'discounted_price' => $request->disc_price,
            ]);
            foreach ($request->pcategory as $category) {
                ProductCategory::create([
                    'product_id' => $product->id,
                    'category_id' => $category,
                ]);
            }
            foreach ($request->product_image as $product_img) {
                $allowedfileExtension = ['jpeg', 'jpg', 'png'];
                $extension = $product_img->getClientOriginalExtension();
                $checkExtension = in_array($extension, $allowedfileExtension);
                if ($checkExtension) {
                    $originalName = $product_img->getClientOriginalName();
                    $folder = 'products/' . 'product_' . $product->id;
                    $path = $product_img->storeAs($folder, $originalName, env('DISK'));
                    ProductImage::create([
                        'product_id' => $product->id,
                        'product_image_path' => $path,
                    ]);
                } else {
                    return false;
                }
            }
            DB::commit();
            return $product;
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->with(['error' => __('messages.serverError')]);
        }
    }
}
