@extends('admin.layouts.master')

@section('title')
    Colors | Create
@endsection

@section('content')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="container my-5 mx-auto">
                @include('partials.session')
                <form class="form-vertical" action="{{route('colors.store')}}" method="post">
                    @csrf
                    <div class="form-group mb-4">
                        <label class="control-label">Color Name:</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid fparsley-error parsley-error @enderror" placeholder="Color Name" value="{{old('name')}}">
                        @error('name')
                        <span class="invalid-feedback text-danger" role="alert">
                          <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="control-label">Hexa Code:</label>
                        <input type="color" name="hexa" class="form-control @error('hexa') is-invalid fparsley-error parsley-error @enderror" placeholder="Color Hexa Code" value="{{old('hexa')}}">
                        @error('hexa')
                        <span class="invalid-feedback text-danger" role="alert">
                          <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>

                    <input type="submit" value="Create" class="btn btn-primary ml-3 mt-3">
                </form>
            </div>
        </div>
    </div>

    <!-- End Card -->
@endsection

