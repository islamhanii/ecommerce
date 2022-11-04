@extends('endUser.layouts.app')

@section('title')
    Vegist - Multipurpose eCommerce HTML Template
@endsection

@section('content')
<section class="section-tb-padding">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="login-area">
                    <div class="login-box">
                        <h1>Login</h1>
                        <p>Please login below account detail</p>
                        @include('partials._errors')
                        @include('partials._session')
                        <form method="POST" action="{{route('user.login')}}">
                            @csrf
                            <label>Email address</label>
                            <input type="text" name="email" placeholder="Email address" value="{{old('email')}}">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Password">
                            <button type="submit" class="btn-style1" style="width:100%; margin-top:20px;">Sign in</button>
                            <a href="#" class="re-password">Forgot your password?</a>
                        </form>
                    </div>
                    <div class="login-account">
                        <h4>Don't have an account?</h4>
                        <a href="{{route('user.registerPage')}}" class="ceate-a">Create account</a>
                        <div class="login-info">
                            <a href="terms-conditions.html" class="terms-link"><span>*</span> Terms &amp; conditions.</a>
                            <p>Your privacy and security are important to us. For more information on how we use your data read our <a href="#">privacy policy</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
