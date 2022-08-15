@extends('admin.layouts.master')

@section('title')
    Policy | Update
@endsection
@section('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{asset('assetsAdmin/assets/css/elements/miscellaneous.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assetsAdmin/assets/css/elements/breadcrumb.css')}}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{asset('assetsAdmin/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('assetsAdmin/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="path/to/assets/content-styles.css" type="text/css">

    <!--  END CUSTOM STYLE FILE  -->
@endsection

@section('content')
    <div id="content" class="main-content">
        <div class="container">
            <div class="container my-5">
                @include('partials.session')
                <form class="form-vertical" action="{{route('policy.update')}}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="policy_id" value="{{$policy->id}}">
                    <div class="form-group mb-4">
                        <label class="control-label">Policy Name:</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid fparsley-error parsley-error @enderror" placeholder="Policy Name" value="{{$policy->title}}">
                        @error('name')
                        <span class="invalid-feedback text-danger" role="alert">
                          <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <textarea rows="5" cols="95" id="editor" name="description" class="bg-dark @error('description') is-invalid fparsley-error parsley-error @enderror">{!! $policy->description !!}</textarea>
                        @error('description')
                        <span class="invalid-feedback text-danger" role="alert">
                          <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <select class="form-control  basic @error('select') is-invalid fparsley-error parsley-error @enderror" name="select">
                            <option value="Choose CategoryPolicy">Choose CategoryPolicy</option>
                            @foreach($catPolicies as $value)
                                <option value="{{$value->id}}" {{($policy->category_policy_id == $value->id) ? 'selected' : ''}}>{{$value->name}}</option>
                            @endforeach
                        </select>
                        @error('select')
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
@section('js')
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="{{asset('assetsAdmin/assets/js/scrollspyNav.js')}}"></script>
    <script src="{{asset('assetsAdmin/plugins/select2/select2.min.js')}}"></script>
    <script src="{{asset('assetsAdmin/plugins/select2/custom-select2.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>


    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        var ss = $(".basic").select2({
            tags: true,
        });
    </script>
@endsection

