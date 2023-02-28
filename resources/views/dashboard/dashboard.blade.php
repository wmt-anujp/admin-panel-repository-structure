@extends('layouts.master2')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="container-fluid mt-5">
        @role('admin')
            <p>Welcome admin</p>
        @endrole
        @role('customer')
            <p>Welcome Customer</p>
        @endrole
        <a href="{{route('logout.perform')}}" class="btn btn-outline-danger">Logout</a>
    </div>
@endsection