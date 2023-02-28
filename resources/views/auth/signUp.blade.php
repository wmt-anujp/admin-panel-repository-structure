@extends('layouts.master2')
@section('title')
    Register
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <form method="POST" action="{{route('signUp.perform')}}" id="signup">
                    @csrf
                    <div class="form-outline mt-4">
                        <label class="form-label" for="fname">First Name</label>
                        <input type="text" id="fname" name="fname" class="form-control form-control-lg" placeholder="Enter your first name">
                        @if ($errors->has('fname'))
                            <span class="text-danger">{{ $errors->first('fname') }}*</span>
                        @endif
                    </div>
                    <div class="form-outline mt-4">
                        <label class="form-label" for="lname">Last Name</label>
                        <input type="text" id="lname" name="lname" class="form-control form-control-lg" placeholder="Enter your last name">
                        @if ($errors->has('lname'))
                            <span class="text-danger">{{ $errors->first('lname') }}*</span>
                        @endif
                    </div>
                    <div class="form-outline mt-4">
                        <label class="form-label" for="mobile">Mobile Number</label>
                        <input type="text" id="mobile" name="mobile" class="form-control form-control-lg" placeholder="Enter your mobile number">
                        @if ($errors->has('mobile'))
                            <span class="text-danger">{{ $errors->first('mobile') }}*</span>
                        @endif
                    </div>
                    <div class="form-outline mt-4">
                        <label class="form-label" for="email">Email address</label>
                        <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Enter a valid email address">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}*</span>
                        @endif
                    </div>
                    <div class="form-outline mt-4">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Enter Password">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}*</span>
                        @endif
                    </div>
                    <div class="form-outline mt-4">
                        <label class="form-label" for="password">Confirm Password</label>
                        <input type="password" id="cpassword" name="cpassword" class="form-control form-control-lg" placeholder="Confirm Password">
                        @if ($errors->has('cpassword'))
                            <span class="text-danger">{{ $errors->first('cpassword') }}*</span>
                        @endif
                    </div>
                    <div class="text-center text-lg-start mt-4">
                        <button type="submit" class="btn btn-primary" id="signup" style="padding-left: 1.5rem; padding-right: 1.5rem;">SignUp</button>
                        <a href="{{route('login')}}" class="btn btn-secondary">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('#signup').on('submit', function() {
            $('#signup').attr('disabled', 'disabled');
        });
    });
</script>
<script src="{{URL::to('src/js/auth/registerValidation.js')}}"></script>
@endsection