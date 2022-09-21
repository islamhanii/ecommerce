@extends('admin.layouts.master')

@section('title')
    Sizes | Create
@endsection
@section('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{asset('assetsAdmin/assets/css/elements/miscellaneous.css')}}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{asset('assetsAdmin/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('assetsAdmin/plugins/select2/select2.min.css')}}">
    <!--  END CUSTOM STYLE FILE  -->
@endsection

@section('content')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="container my-5 mx-auto">
                @include('partials.session')
                <form class="form-vertical" action="{{route('sizes.store')}}" method="post">
                    @csrf
                    <div class="form-group mb-4">
                        <label class="control-label">Size:</label>
                        <input type="text" name="size" class="form-control @error('size') is-invalid fparsley-error parsley-error @enderror" placeholder="SizeUnit Value" value="{{old('size')}}">
                        @error('size')
                        <span class="invalid-feedback text-danger" role="alert">
                          <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <select class="form-control  basic @error('size_unit_id') is-invalid fparsley-error parsley-error @enderror" name="size_unit_id">
                            <option value="Choose SizeUnit">Choose SizeUnit</option>
                            @foreach($sizeUnits as $sizeUnit)
                            <option value="{{$sizeUnit->id}}">{{$sizeUnit->unit}}</option>
                            @endforeach
                        </select>
                        @error('size_unit_id')
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

    <script>
        var ss = $(".basic").select2({
            tags: true,
        });
    </script>
@endsection
