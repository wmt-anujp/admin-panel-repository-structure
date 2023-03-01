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
    <a href="{{route('add.customer')}}" class="btn btn-primary mt-3 mb-3">Add Customer</a>
    <div class="card mt-3">
        <div class="card-body">
            {{ $dataTable->table() }}
            {{ $dataTable->scripts() }}
        </div>
    </div>
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