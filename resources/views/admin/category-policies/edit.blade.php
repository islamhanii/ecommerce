@extends('admin.layouts.master')

@section('title')
    CategoryPolicy | Update
@endsection

@section('content')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="container my-5 mx-auto">
                @include('partials.session')
                <form class="form-vertical" action="{{route('categoryPolicy.update')}}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="cat_id" value="{{$categoryPolicy->id}}">
                    <div class="form-group mb-4">
                        <label class="control-label">CategoryPolicy Name:</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid fparsley-error parsley-error @enderror" placeholder="CategoryPolicy Name" value="{{$categoryPolicy->name}}">
                        @error('name')
                        <span class="invalid-feedback text-danger" role="alert">
                          <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>

                    <input type="submit" value="Update" class="btn btn-primary ml-3 mt-3">
                </form>
            </div>
        </div>
    </div>

    <!-- End Card -->
@endsection

