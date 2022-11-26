@extends('endUser.layouts._profile')

@section('category')
    <div class="profile-form">
        @include('partials._errors')
        @include('partials._session')
        <form action="{{route('profile.update')}}" method="POST">
            @csrf
            @method('PUT')
            <ul class="pro-input-label">
                <li style="width: 100%">
                    <label>First name</label>
                    <input type="text" name="name" placeholder="Name" value="{{auth()->user()->name}}">
                </li>
            </ul>
            <ul class="pro-input-label">
                <li>
                    <label>Email address</label>
                    <input type="text" name="email" placeholder="Email address"  value="{{auth()->user()->email}}" required>
                </li>
                <li>
                    <label>Phone number</label>
                    <input type="text" name="phone" placeholder="Phone number"  value="{{auth()->user()->phone}}">
                </li>
            </ul>
            <ul class="pro-input-label">
                <li>
                    <label>New password</label>
                    <input type="password" name="password" placeholder="New password">
                </li>
                <li>
                    <label>Confirm password</label>
                    <input type="password" name="password_confirmation" placeholder="Confirm password">
                </li>
            </ul>
            <ul class="pro-submit">
                <li>
                    <button type="submit" class="btn btn-style1">Update profile</button>
                </li>
            </ul>
        </form>
    </div>
@endsection
