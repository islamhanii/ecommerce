@extends('endUser.layouts.app')

@section('title')
    Vegist - Multipurpose eCommerce HTML Template
@endsection

@section('content')
<section class="section-tb-padding">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="register-area">
                    <div class="register-box">
                        <h1>Create account</h1>
                        <p>Please register below account detail</p>
                        @include('partials._errors')
                        @include('partials._session')
                        <form method="post" action="{{route('user.register')}}">
                            @csrf
                            <input type="text" name="name" placeholder="Your name" value="{{old('name')}}">
                            <input type="text" name="email" placeholder="Email address" value="{{old('email')}}">
                            <input type="text" name="phone" placeholder="Phone number (+20)" value="{{old('phone')}}">
                            <input type="text" name="city" placeholder="City" value="{{old('city')}}">
                            <textarea name="address" placeholder="Address" style="width:100%; margin-top:20px;">{{old('address')}}</textarea>
                            <input type="password" name="password" placeholder="Password">
                            <input type="password" name="password_confirmation" placeholder="Confirm password">
                            <button type="submit" class="btn-style1" style="width:100%; margin-top:20px;">Create</button>
                        </form>
                    </div>
                    <div class="register-account">
                        <h4>Already an account holder?</h4>
                        <a href="{{route('user.loginPage')}}" class="ceate-a">Log in</a>
                        <div class="register-info">
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
