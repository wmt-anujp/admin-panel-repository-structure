<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CustomerController;
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
        Route::post('/register', [AuthController::class, 'userSignup'])->name('signUp.perform');
        Route::get('logout', [AuthController::class, 'logout'])->withoutMiddleware('guest')->name('logout.perform');
    });
    Route::middleware('userAuth:web')->group(function () {
        Route::get("addCustomer", function () {
            return view('customer.addCustomer');
        })->name('add.customer');

        Route::get('dasboard', [CustomerController::class, 'getAllCustomer'])->name('get.Dashboard');
        Route::post('addCustomer', [CustomerController::class, 'addNewCustomer'])->name('add.Customer');
        Route::get('editCustomer/{id}', function ($id) {
            $customer = User::find($id);
            return view('customer.editCustomer')->with(['customer' => $customer]);
        })->name('getEditCustomer');
        Route::post('editCustomer', [CustomerController::class, 'editCustomer'])->name('editCustomer');
        Route::post('deleteCustomer', [CustomerController::class, 'deleteCustomer'])->name('deleteCustomer.perform');
    });
});
