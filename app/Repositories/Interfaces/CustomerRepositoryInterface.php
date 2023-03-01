<?php

namespace App\Repositories\Interfaces;

use App\DataTables\UsersDataTable;
use App\Http\Requests\Customer\EditCustomerRequest;
use Illuminate\Http\Request;

interface CustomerRepositoryInterface
{
    // public function allCustomer(UsersDataTable $dataTable);
    public function deleteCustomer(Request $request);
    public function editCustomer(EditCustomerRequest $request);
}
