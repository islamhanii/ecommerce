@extends('admin.layouts.master')

@section('title')
    Details | Create
@endsection

@section('content')

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="container my-5 mx-auto">
                @include('partials.session')
                <form class="form-vertical" action="{{route('details.store')}}" method="post">
                    @csrf
                    <div class="form-group mb-4">
                        <label class="control-label">Detail Title:</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid fparsley-error parsley-error @enderror" placeholder="Detail Title" value="{{old('title')}}">
                        @error('title')
                        <span class="invalid-feedback text-danger" role="alert">
                          <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="control-label">Detail Value:</label>
                        <input type="text" name="value" class="form-control @error('value') is-invalid fparsley-error parsley-error @enderror" placeholder="Detail Value" value="{{old('value')}}">
                        @error('value')
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
