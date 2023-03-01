@extends('layouts.master')
@section('title')
    Edit Customer
@endsection
@section('content')
<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">
            <h4><b>Edit Customer</b></h4>
        </div>
        <div class="card-body">
            <form action="{{route('editCustomer')}}" method="POST" id="editCustomerForm">
                @csrf
                <div class="row mb-4">
                    <div class="col-sm-4">
                        <input type="hidden" value="{{$customer->id}}" name="customer_id" id="customer_id">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="fname" id="fname" value="{{$customer->first_name}}" placeholder="Enter customer's first name">
                        @if ($errors->has('fname'))
                            <span class="text-danger">{{ $errors->first('fname') }}*</span>
                        @endif
                    </div>
                    
                    <div class="col-sm-4 mt-sm-0 mt-4">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="lname" id="lname" value="{{$customer->last_name}}" placeholder="Enter customer's last name">
                        @if ($errors->has('lname'))
                            <span class="text-danger">{{ $errors->first('lname') }}*</span>
                        @endif
                    </div>

                    <div class="col-sm-4 mt-sm-0 mt-4">
                        <label for="mobile" class="form-label">Mobile Number</label>
                        <input type="text" class="form-control" name="mobile" id="mobile" value="{{$customer->mobile_number}}" placeholder="Enter customer's mobile number">
                        @if ($errors->has('mobile'))
                            <span class="text-danger">{{ $errors->first('mobile') }}*</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{$customer->email}}" placeholder="Enter customer's first name">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}*</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary" id="updateCustomer">Update Customer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="{{URL::to('src/js/customer/editCustomer.js')}}"></script>
@endsection