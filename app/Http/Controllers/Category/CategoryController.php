<?php

namespace App\Http\Controllers\Category;

use App\DataTables\CategoriesDataTable;
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

    public function getCategories(CategoriesDataTable $categoriesDataTable)
    {
        return $categoriesDataTable->render('dashboard.dashboard');
    }

    public function deleteCategory(Request $request)
    {
        $this->categoryRepository->deleteCategory($request);
        return response()->json(['success' => __('messages.category.delete')]);
    }

    public function editCategory(CategoryRequest $request)
    {
        $this->categoryRepository->editCategory($request);
        return redirect()->route('get.Dashboard')->with(['success' => __('messages.category.edit')]);
    }
}
