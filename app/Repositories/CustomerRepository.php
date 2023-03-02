<?php

namespace App\Repositories;

use App\Http\Requests\Customer\EditCustomerRequest;
use App\Models\User;
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use Illuminate\Http\Request;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function deleteCustomer(Request $request)
    {
        try {
            $customer = User::find($request->id);
            $customer->delete();
            return $customer;
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', __('messages.serverError'));
        }
    }

    public function editCustomer(EditCustomerRequest $request)
    {
        try {
            User::find($request->customer_id)->update([
                'first_name' => $request->fname,
                'last_name' => $request->lname,
                'slug' => $request->slug,
                'mobile_number' => $request->mobile,
                'email' => $request->email,
            ]);
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            dd($exception);
            return redirect()->back()->with('error', __('messages.serverError'));
        }
    }
}
