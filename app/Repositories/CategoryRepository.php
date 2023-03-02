<?php

namespace App\Repositories;

use App\Http\Requests\Category\CategoryRequest;
use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAllCategories()
    {
        try {
            $categories = Category::all();
            return $categories;
        } catch (\Exception $exception) {
            return redirect()->back()->with(['error' => __('messages.serverError')]);
        }
    }

    public function addCategory(CategoryRequest $request)
    {
        try {
            $category = Category::create([
                'parent_category_id' => isset($request->pcategory) ? $request->pcategory : null,
                'name' => $request->name,
            ]);
            return $category;
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', __('messages.serverError'));
        }
    }

    public function deleteCategory(Request $request)
    {
        try {
            $category = Category::find($request->id);
            $category->delete();
            return $category;
        } catch (\Exception $exception) {
            return redirect()->back()->with(['error' => __('messages.serverError')]);
        }
    }

    public function editCategory(CategoryRequest $request)
    {
        try {
            $category = Category::find($request->category_id)->update([
                'parent_category_id' => isset($request->pcategory) ? $request->pcategory : null,
                'name' => $request->name,
            ]);
            return $category;
        } catch (\Exception $exception) {
            return redirect()->back()->with(['error' => __('messages.serverError')]);
        }
    }
}
