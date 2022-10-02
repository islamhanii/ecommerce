@extends('admin.layouts.master')

@section('title')
    Policies | Create
@endsection
@section('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{asset('assetsAdmin/assets/css/elements/miscellaneous.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assetsAdmin/assets/css/elements/breadcrumb.css')}}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{asset('assetsAdmin/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('assetsAdmin/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assetsAdmin/plugins/editors/quill/quill.snow.css')}}">
    <!--  END CUSTOM STYLE FILE  -->
@endsection

@section('content')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="container my-5 mx-auto">
                @include('partials.session')
                <form class="form-vertical" action="{{route('policies.store')}}" method="post">
                    @csrf
                    <div class="form-group mb-4">
                        <label class="control-label">Policy Title:</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid fparsley-error parsley-error @enderror" placeholder="Policy Title" value="{{old('title')}}">
                        @error('title')
                        <span class="invalid-feedback text-danger" role="alert">
                          <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <textarea rows="5" cols="95" id="editor" name="description" class="bg-dark @error('description') is-invalid fparsley-error parsley-error @enderror"></textarea>
                        @error('description')
                        <span class="invalid-feedback text-danger" role="alert">
                          <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <select class="form-control  basic @error('policy_category_id') is-invalid fparsley-error parsley-error @enderror" name="policy_category_id">
                            <option value="Choose Policy Category">Choose Policy Category</option>
                            @foreach($policyCategories as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        @error('policy_category_id')
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
@section('js')
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="{{asset('assetsAdmin/assets/js/scrollspyNav.js')}}"></script>
    <script src="{{asset('assetsAdmin/plugins/select2/select2.min.js')}}"></script>
    <script src="{{asset('assetsAdmin/plugins/select2/custom-select2.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

    <script>
        var ss = $(".basic").select2({
            tags: true,
        });
    </script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>


@endsection
