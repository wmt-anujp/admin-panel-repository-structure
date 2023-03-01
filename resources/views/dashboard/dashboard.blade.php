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
    <a href="" class="btn btn-info mt-3 mb-3">Add Category</a>
    <div class="card mt-3">
        <div class="card-body">
            {{ $dataTable->table() }}
            {{ $dataTable->scripts() }}
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
                type: "POST",
                url: "{{route('deleteCustomer.perform')}}",
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