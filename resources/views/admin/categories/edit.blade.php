@extends('admin.layouts.master')

@section('title')
    Category | Edit
@endsection


@section('content')
    <!-- Start Card -->
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="container my-5 mx-auto">
                @include('partials.session')
                <form method="post" action="{{ route('categories.update', [$edit->id]) }}" method="post">
                  @csrf
                      @method('PUT')
                      <input type="hidden" name="category_id" value="{{$edit->id}}">
                      <div class="form-body">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label"><span class="required"></span> </label>
                            <div class="col-md-6">
                                <input type="text" name="name" value="{{$edit->name}}" class="form-control" placeholder="Name" required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong class="help-block">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <input type="submit" value="Update" class="btn btn-primary ml-3 mt-3">
                    <a href="{{ route('categories.index') }}" class="btn  btn-danger ml-3 mt-3">Cancel</a>
                </form>
            </div>
        </div>
    </div>

    <!-- End Card -->
@endsection
