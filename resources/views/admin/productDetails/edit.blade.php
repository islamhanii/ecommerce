@extends('admin.layouts.master')

@section('title')
    ProductDetails | Edit
@endsection

@section('css')
    <link href="{{asset('assetsAdmin/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('assetsAdmin/plugins/select2/select2.min.css')}}">
    <link href="{{asset('assetsAdmin/plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="container my-5 mx-auto">
                @include('partials.session')
                <form class="form-vertical" action="{{route('product.details.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="product_details_id" value="{{$productDetails->id}}">
                    <div class="form-group mb-4">
                        <label class="control-label">Stock:</label>
                        <input type="number" name="stock" class="form-control @error('price') is-invalid fparsley-error parsley-error @enderror" value="{{old('stock')?old('stock'):$productDetails->stock}}">
                        @error('stock')
                        <span class="invalid-feedback text-danger" role="alert">
                          <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>

                    @if ($productDetails->image)
                        <div class="custom-file-container__image-preview">
                         <img src="{{asset('uploads/'.$productDetails->image)}}" class="rounded-circle profile-img text-center" width="650px" height="250px" alt="avatar">
                        </div>
                    @endif
                    <div class="custom-file-container" data-upload-id="myFirstImage">
                        <label>Upload (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                        <label class="custom-file-container__custom-file" >
                            <input type="file" class="custom-file-container__custom-file__custom-file-input @error('image') is-invalid fparsley-error parsley-error @enderror" name="image">
                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                            <span class="custom-file-container__custom-file__custom-file-control @error('image') is-invalid fparsley-error parsley-error @enderror"></span>
                        </label>
                        <div class="custom-file-container__image-preview"></div>
                        @error('image')
                        <span class="invalid-feedback text-danger" role="alert">
                          <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <select class="form-control  basic @error('product_id') is-invalid fparsley-error parsley-error @enderror" name="product_id">
                            <option>Choose Product</option>
                            @isset($products)
                            @foreach($products as $item)
                                <option value="{{$item->id}}" title="{{$item->product_names[0]->name}}" {{($productDetails->product_id == $item->id) ? 'selected' : ''}}>{{$item->product_names[1]->name}}</option>
                            @endforeach
                            @endisset
                        </select>
                        @error('product_id')
                        <span class="invalid-feedback text-danger" role="alert">
                          <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <select class="form-control  basic @error('size_id') is-invalid fparsley-error parsley-error @enderror" name="size_id">
                            <option>Choose Size</option>
                            @isset($sizes)
                            @foreach($sizes as $item)
                                <option value="{{$item->id}}" {{($productDetails->size_id == $item->id) ? 'selected' : ''}}>{{$item->size}} {{$item->size_unit->unit}}</option>
                            @endforeach
                            @endisset
                        </select>
                        @error('size_id')
                        <span class="invalid-feedback text-danger" role="alert">
                          <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <select class="form-control @error('color_id') is-invalid fparsley-error parsley-error @enderror" name="color_id">
                            <option>Choose Color</option>
                            @isset($colors)
                            @foreach($colors as $item)
                                <option value="{{$item->id}}" style="background-color: {{$item->hexa}} !important;" {{($productDetails->color_id == $item->id) ? 'selected' : ''}}>{{$item->name}} ({{'#'.$item->hexa}})</option>
                            @endforeach
                            @endisset
                        </select>
                        @error('color_id')
                        <span class="invalid-feedback text-danger" role="alert">
                          <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>

                    <input type="submit" value="Edit" class="btn btn-primary ml-3 mt-3">
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
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>


    <script>
        //editor
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
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
