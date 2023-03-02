<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\Category\CategoryRequest;
use Illuminate\Http\Request;

interface CategoryRepositoryInterface
{
    public function getAllCategories();
    public function addCategory(CategoryRequest $request);
    public function deleteCategory(Request $request);
    public function editCategory(CategoryRequest $request);
}
