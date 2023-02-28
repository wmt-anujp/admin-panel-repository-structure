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
            <table id="userTable" class="table table-bordered table-hover"></table>
        </div>
    </div>
</div>
@endsection