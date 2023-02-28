<?php

namespace App\Repositories;

use App\Http\Requests\Customer\AddCustomerRequest;
use App\Models\User;
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function addCustomer(AddCustomerRequest $request)
    {
        try {
            $randomPassword = Str::random(20);
            $user = User::create([
                'first_name' => $request->fname,
                'last_name' => $request->lname,
                'slug' => $request->slug,
                'email' => $request->email,
                'password' => Hash::make($randomPassword),
                'mobile_number' => $request->mobile,
            ])->assignRole('customer');
            return $user;
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', __('messages.serverError'));
        }
    }
}
