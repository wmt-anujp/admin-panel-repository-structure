@extends('layouts.master')
@section('title')
    Add Customer
@endsection
@section('content')
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-header">
                <h4><b>Add Customer</b></h4>
            </div>
            <div class="card-body">
                <form action="{{route('add.Customer')}}" method="POST" id="addCustomerForm">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-sm-4">
                            <label for="fname" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter customer's first name">
                            @if ($errors->has('fname'))
                                <span class="text-danger">{{ $errors->first('fname') }}*</span>
                            @endif
                        </div>
                        
                        <div class="col-sm-4 mt-sm-0 mt-4">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter customer's last name">
                            @if ($errors->has('lname'))
                                <span class="text-danger">{{ $errors->first('lname') }}*</span>
                            @endif
                        </div>

                        <div class="col-sm-4 mt-sm-0 mt-4">
                            <label for="mobile" class="form-label">Mobile Number</label>
                            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter customer's mobile number">
                            @if ($errors->has('mobile'))
                                <span class="text-danger">{{ $errors->first('mobile') }}*</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-4">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter customer's first name">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}*</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary" id="addCustomer">Add Customer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="{{URL::to('src/js/customer/addCustomer.js')}}"></script>
@endsection