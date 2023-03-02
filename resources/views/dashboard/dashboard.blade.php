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
    <a href="{{route('add.customer')}}" class="btn btn-primary mt-3 mb-3">Add Customer</a>
    <a href="{{route('add.Category')}}" class="btn btn-info mt-3 mb-3">Add Category</a>
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
    </script>
@endsection