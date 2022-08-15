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
                      <input type="hidden" name="cat_id" value="{{$edit->id}}">
                      @include('admin.categories.incs._fields', [
                          'data' => collect($edit),
                          'action' => 'edit'
                      ])

                    <input type="submit" value="Update" class="btn btn-primary ml-3 mt-3">
                    <a href="{{ route('categories.index') }}" class="btn  btn-danger ml-3 mt-3">Cancel</a>
                </form>
            </div>
        </div>
    </div>

    <!-- End Card -->
@endsection
