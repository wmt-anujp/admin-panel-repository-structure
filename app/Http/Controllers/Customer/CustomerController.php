<?php

namespace App\Http\Controllers\Customer;

use App\DataTables\CategoriesDataTable;
use App\DataTables\ProductsDataTable;
use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\EditCustomerRequest;
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class CustomerController extends Controller
{
    private $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function getDashboard(UsersDataTable $usersDataTable, CategoriesDataTable $categoriesDataTable, ProductsDataTable $productDataTable)
    {
        return view('dashboard.dashboard', [
            'usersDataTable' => $usersDataTable->html(),
            'categoriesDataTable' => $categoriesDataTable->html(),
            'productDataTable' => $productDataTable->html(),
        ]);
    }

    public function getCustomers(UsersDataTable $usersDataTable)
    {
        return $usersDataTable->render('dashboard.dashboard');
    }

    public function deleteCustomer(Request $request)
    {
        $this->customerRepository->deleteCustomer($request);
        return response()->json(['success' => __('messages.customer.delete')]);
    }

    public function editCustomer(EditCustomerRequest $request)
    {
        $this->customerRepository->editCustomer($request);
        return redirect()->route('get.Dashboard')->with(['success' => __('messages.customer.edit')]);
    }
}
