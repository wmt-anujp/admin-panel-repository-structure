@extends('layouts.master')
@section('title')
    Dashboard
@endsection
@section('csrf')
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
@endsection
@section('content')
<div class="container-fluid">
    @role('admin')
    <a href="{{route('add.Customer')}}" class="btn btn-primary mt-3 mb-3">Add Customer</a>
    <a href="{{route('add.Category')}}" class="btn btn-info mt-3 mb-3">Add Category</a>
    <a href="{{route('add.Product')}}" class="btn btn-info mt-3 mb-3">Add Product</a>
    <div class="card mt-3">
        <div class="card-header">
            <h4><b>Customers</b></h4>
        </div>
        <div class="card-body">
            {{ $usersDataTable->table() }}
            {{ $usersDataTable->scripts() }}
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            <h4><b>Categories</b></h4>
        </div>
        <div class="card-body">
            {{ $categoriesDataTable->table() }}
            {{ $categoriesDataTable->scripts() }}
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            <h4><b>Products</b></h4>
        </div>
        <div class="card-body">
            {{ $productDataTable->table() }}
            {{ $productDataTable->scripts() }}
        </div>
    </div>
    @endrole
    @role('customer')
    <div class="card mt-3">
        <div class="card-body">
            <p>Welcome Customer</p>
        </div>
    </div>
    @endrole
</div>
@endsection
@section('js')
    <script>
        function deleteCustomer(id){
            swal({
                title: 'Delete!',
                text: 'Are You Sure You Want To Delete?',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "{{route('deleteCustomer.perform')}}",
                        type: "POST",
                        data: {
                            _token: '{{csrf_token()}}',
                            id: id,
                        },
                        success: function (response) {
                            if (response?.success) {
                                SuccessNotifify(response.success)
                            } else {
                                ErrorNotifify(response.failed)
                            }
                            $('#userTable').DataTable().ajax.reload();
                        }
                    });
                }
            });
            
        }

        function deleteCategory(id){
            event.preventDefault();
            swal({
                title: 'Delete!',
                text: 'Are You Sure You Want To Delete?',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "{{route('deleteCategory.perform')}}",
                        type: "POST",
                        dataType: "JSON",
                        data: {
                            _token: '{{csrf_token()}}',
                            id: id,
                        },
                        success: function (response) {
                            if (response?.success) {
                                SuccessNotifify(response.success)
                            } else {
                                ErrorNotifify(response.failed)
                            }
                            $('#categoriesTable').DataTable().ajax.reload();
                        }
                    });
                }
            });
            
        }

        function deleteProduct(id) {
            event.preventDefault();
            swal({
                title: 'Delete!',
                text: 'Are You Sure You Want To Delete?',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "{{route('deleteProduct.perform')}}",
                        dataType: "JSON",
                        type: "POST",
                        data: {
                            _token: '{{csrf_token()}}',
                            id: id,
                        },
                        success: function (response) {
                            if (response?.success) {
                                SuccessNotifify(response.success)
                            } else {
                                ErrorNotifify(response.failed)
                            }
                            $('#productsDataTable').DataTable().ajax.reload();
                        }
                    });
                }
            });
        }
    </script>
@endsection