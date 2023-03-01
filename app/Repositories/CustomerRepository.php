<?php

namespace App\Repositories;

use App\DataTables\UsersDataTable;
use App\Http\Requests\Customer\AddCustomerRequest;
use App\Models\User;
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use Illuminate\Http\Request;
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

    // public function allCustomer(UsersDataTable $dataTable)
    // {
    //     try {
    //         $users = User::role('customer')->get();
    //         return $users;
    //     } catch (\Exception $exception) {
    //         return redirect()->back()->with('error', __('messages.serverError'));
    //     }
    // }

    public function deleteCustomer(Request $request)
    {
        try {
            $customer = User::find($request->id);
            $customer->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', __('messages.serverError'));
        }
    }
}
