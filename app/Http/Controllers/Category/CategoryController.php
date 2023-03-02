<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategories()
    {
        $category = $this->categoryRepository->getAllCategories();
        return response()->json(['category' => $category]);
    }

    public function addNewCategory(CategoryRequest $request)
    {
        $this->categoryRepository->addCategory($request);
        return redirect()->route('get.Dashboard')->with(['success' => __('messages.category.added')]);
    }
}
