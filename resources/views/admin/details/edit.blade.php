@extends('admin.layouts.master')

@section('title')
    Detail | Edit
@endsection


@section('content')
    <!-- Start Card -->
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="container my-5 mx-auto">
                @include('partials.session')
                <form method="post" action="{{ route('details.update', [$detail->id]) }}" method="post">
                  @csrf
                    @method('PUT')
                    <input type="hidden" name="detail_id" value="{{$detail->id}}">
                    <div class="form-body">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label"><span class="required"></span> </label>
                            <div class="col-md-6">
                                <input type="text" name="title" value="{{old('title')?old('title'):$detail->key}}" class="form-control" placeholder="Title" required>
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong class="help-block">{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label"><span class="required"></span> </label>
                            <div class="col-md-6">
                                <input type="text" name="value" value="{{old('value')?old('value'):$detail->value}}" class="form-control" placeholder="Value" required>
                                @if ($errors->has('value'))
                                    <span class="help-block">
                                        <strong class="help-block">{{ $errors->first('value') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <input type="submit" value="Update" class="btn btn-primary ml-3 mt-3">
                    <a href="{{ route('details.index') }}" class="btn  btn-danger ml-3 mt-3">Cancel</a>
                </form>
            </div>
        </div>
    </div>

    <!-- End Card -->
@endsection
