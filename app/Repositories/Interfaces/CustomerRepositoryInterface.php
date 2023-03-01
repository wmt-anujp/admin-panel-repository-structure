<?php

namespace App\Repositories\Interfaces;

use App\DataTables\UsersDataTable;
use App\Http\Requests\Customer\AddCustomerRequest;
use Illuminate\Http\Request;

interface CustomerRepositoryInterface
{
    // public function allCustomer(UsersDataTable $dataTable);
    public function addCustomer(AddCustomerRequest $request);
    public function deleteCustomer(Request $request);
}
