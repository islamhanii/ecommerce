@extends('admin.layouts.master')

@section('title')
    Companies | Edit
@endsection

@section('css')
    <link href="{{asset('assetsAdmin/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('assetsAdmin/plugins/select2/select2.min.css')}}">
    <link href="{{asset('assetsAdmin/plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!-- Start Card -->
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="container my-5 mx-auto">
                @include('partials.session')
                <form class="form-vertical" action="{{route('companies.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="company_id" value="{{$company->id}}">
                    <div class="form-group mb-4">
                        <label class="control-label">Company Sort:</label>
                        <input type="number" name="sort" class="form-control @error('price') is-invalid fparsley-error parsley-error @enderror" value="{{old('sort')}}">
                        @error('sort')
                        <span class="invalid-feedback text-danger" role="alert">
                          <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>

                    @if ($company->image)
                        <div class="custom-file-container__image-preview">
                         <img src="{{asset('uploads/'.$company->image)}}" class="rounded-circle profile-img text-center" width="650px" height="250px" alt="avatar">
                        </div>
                    @endif
                    <div class="custom-file-container" data-upload-id="myFirstImage">
                        <label>Upload (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                        <label class="custom-file-container__custom-file" >
                            <input type="file" class="custom-file-container__custom-file__custom-file-input @error('image') is-invalid fparsley-error parsley-error @enderror" name="image">
                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                        </label>
                        <div class="custom-file-container__image-preview"></div>
                        @error('image')
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
    <script src="{{asset('assetsAdmin/assets/js/scrollspyNav.js')}}"></script>
    <script src="{{asset('assetsAdmin/plugins/select2/select2.min.js')}}"></script>
    <script src="{{asset('assetsAdmin/plugins/select2/custom-select2.js')}}"></script>
    <script src="{{asset('assetsAdmin/plugins/file-upload/file-upload-with-preview.min.js')}}"></script>

    <script>
        //Select
        var ss = $(".basic").select2({
            tags: true,
        });
        //First upload
        var firstUpload = new FileUploadWithPreview('myFirstImage');
        //Second upload
        var secondUpload = new FileUploadWithPreview('mySecondImage');
    </script>
@endsection
