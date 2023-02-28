<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\AddCustomerRequest;
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function addNewCustomer(AddCustomerRequest $request)
    {
        $this->customerRepository->addCustomer($request);
        return redirect()->route('get.Dashboard')->with(['success' => __('messages.customer.added')]);
    }
}
