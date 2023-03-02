<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\Customer\EditCustomerRequest;
use Illuminate\Http\Request;

interface CustomerRepositoryInterface
{
    public function deleteCustomer(Request $request);
    public function editCustomer(EditCustomerRequest $request);
}
