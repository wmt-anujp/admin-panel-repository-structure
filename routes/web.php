<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Product\ProductController;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;


Route::middleware('restrict.backbutton')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/', function () {
            return view('auth.login');
        })->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.perform');
        Route::get('signup', function () {
            return view('auth.signUp');
        })->name('signUp.page');
        Route::post('/register', [AuthController::class, 'userSignup'])->withoutMiddleware('guest')->name('signUp.perform');
        Route::get('logout', [AuthController::class, 'logout'])->withoutMiddleware('guest')->name('logout.perform');
    });
    Route::middleware('userAuth:web')->group(function () {
        Route::get('dasboard', [CustomerController::class, 'getDashboard'])->name('get.Dashboard');

        // customer section
        Route::get("addCustomer", function () {
            return view('customer.addCustomer');
        })->name('add.Customer');
        Route::get('getAllCustomers', [CustomerController::class, 'getCustomers'])->name('get.Customer');
        Route::get('editCustomer/{id}', function ($id) {
            $customer = User::find($id);
            return view('customer.editCustomer')->with(['customer' => $customer]);
        })->name('getEditCustomer');
        Route::post('editCustomer', [CustomerController::class, 'editCustomer'])->name('editCustomer');
        Route::post('deleteCustomer', [CustomerController::class, 'deleteCustomer'])->name('deleteCustomer.perform');

        // category section
        Route::get('addCategory', function () {
            return view('category.addCategory');
        })->name('add.Category');
        Route::get('getCategories', [CategoryController::class, 'getCategories'])->name('get.Category');
        Route::get('allCategory', [CategoryController::class, 'getAllCategories'])->name('getCategories');
        Route::post('addCategory', [CategoryController::class, 'addNewCategory'])->name('add.Category');
        Route::get('editCategory/{id}', function ($id) {
            $category = Category::find($id);
            return view('category.editCategory')->with('category', $category);
        })->name('getEditCategory');
        Route::post('editCategory', [CategoryController::class, 'editCategory'])->name('editCategory');
        Route::post('deleteCategory', [CategoryController::class, 'deleteCategory'])->name('deleteCategory.perform');

        // product section
        Route::get('addProduct', function () {
            return view('product.addProduct');
        })->name('add.Product');
        Route::post('addProducts', [ProductController::class, 'addProducting'])->name('addProduct');
        Route::get('allProducts', [ProductController::class, 'getAllProducts'])->name('getProducts');
        Route::post('deleteProduct', [ProductController::class, 'deleteProduct'])->name('deleteProduct.perform');
        Route::get('editProduct/{id}', function ($id) {
            $product = Product::where('id', $id)->with('categories')->first();
            // dd($product->categories->toArray());
            $category = json_encode(array_column($product->categories->toArray(), 'category_id'));
            return view('product.editProduct')->with(['product' => $product, 'category' => $category]);
        })->name('getEditProduct');
        Route::post('editProduct', [ProductController::class, 'editProduct'])->name('editProduct');
    });
});
