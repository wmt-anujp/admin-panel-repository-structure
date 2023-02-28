@extends('layouts.master2')
@section('title')
    Login
@endsection
@section('content')
    <div class="container-fluid mt-5">
        <div class="row d-flex justify-content-center align-items-center mt-5 mb-sm-4">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <form method="POST" action="{{route('login.perform')}}" id="loginform">
                    @csrf
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
                    <div class="text-center text-lg-start mt-4">
                        <button type="submit" class="btn btn-primary" id="login" style="padding-left: 1.5rem; padding-right: 1.5rem;">Login</button>
                        <a href="{{route('signUp.page')}}" class="btn btn-secondary">SignUp</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('#loginform').on('submit', function() {
            $('#login').attr('disabled', 'disabled');
        });
    });
</script>
<script src="{{URL::to('src/js/auth/loginValidation.js')}}"></script>
@endsection