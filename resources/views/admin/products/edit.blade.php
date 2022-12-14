@extends('admin.layouts.master')

@section('title')
    Products | Edit
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
                <form class="form-vertical" action="{{route('products.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <div class="form-group mb-4">
                        <label class="control-label">Name EN:</label>
                        <input type="text" name="name_en" class="form-control @error('name_en') is-invalid fparsley-error parsley-error @enderror" placeholder="English Name" value="{{$product->name_en}}">
                        @error('name_en')
                        <span class="invalid-feedback text-danger" role="alert">
                          <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="control-label">Name AR:</label>
                        <input type="text" name="name_ar" class="form-control @error('name_ar') is-invalid fparsley-error parsley-error @enderror" placeholder="Arabic Name" value="{{$product->name_ar}}">
                        @error('name_ar')
                        <span class="invalid-feedback text-danger" role="alert">
                          <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="control-label">Product Code:</label>
                        <input type="text" name="code" class="form-control @error('code') is-invalid fparsley-error parsley-error @enderror" placeholder="Product Code" value="{{$product->code}}">
                        @error('code')
                        <span class="invalid-feedback text-danger" role="alert">
                          <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>

                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="number" name="price" class="form-control @error('price') is-invalid fparsley-error parsley-error @enderror" value="{{$product->price}}" aria-label="Amount (to the nearest dollar)">
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                        @error('price')
                        <span class="invalid-feedback text-danger" role="alert">
                          <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>

                    <div class="clipboard">
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">With textarea</span>
                            </div>
                            <textarea id="editor" class="form-control @error('description') is-invalid fparsley-error parsley-error @enderror" aria-label="With textarea" name="description">{!! $product->description !!}</textarea>
                        </div>
                        @error('description')
                        <span class="invalid-feedback text-danger" role="alert">
                          <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>
                    @if ($product->main_image)
                        <div class="custom-file-container__image-preview">
                         <img src="{{asset('uploads/'.$product->main_image)}}" class="rounded-circle profile-img text-center" width="650px" height="250px" alt="avatar">
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
                        <select class="form-control  basic @error('sub_category_id') is-invalid fparsley-error parsley-error @enderror" name="sub_category_id">
                            <option>Choose Category</option>
                            @isset($subcategories)
                                @foreach($subcategories as $item)
                                    <option value="{{$item->id}}" {{($product->sub_category_id == $item->id) ? 'selected' : ''}}>{{$item->name}}</option>
                                @endforeach
                            @endisset
                        </select>
                        @error('sub_category_id')
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
