@extends('admin.layouts.master')

@section('title')
    SizeUnits | Edit
@endsection

@section('content')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="container my-5 mx-auto">
                @include('partials.session')
                <form class="form-vertical" action="{{route('size-unit.update')}}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="size_unit_id" value="{{$sizeUnit->id}}">
                    <div class="form-group mb-4">
                        <label class="control-label">SizeUnit Name:</label>
                        <input type="text" name="unit" class="form-control @error('unit') is-invalid fparsley-error parsley-error @enderror" placeholder="SizeUnit Name" value="{{$sizeUnit->unit}}">
                        @error('unit')
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

