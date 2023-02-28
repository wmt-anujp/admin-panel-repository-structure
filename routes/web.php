<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CustomerController;
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
        Route::get("dasboard", function () {
            return view('dashboard.dashboard');
        })->name('get.Dashboard');
        Route::get("addCustomer", function () {
            return view('customer.addCustomer');
        })->name('add.customer');

        Route::post('addCustomer', [CustomerController::class, 'addNewCustomer'])->name('add.Customer');
    });
});
