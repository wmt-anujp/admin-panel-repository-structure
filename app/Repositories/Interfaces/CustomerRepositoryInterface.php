<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\Customer\AddCustomerRequest;

interface CustomerRepositoryInterface
{
    public function addCustomer(AddCustomerRequest $request);
}
