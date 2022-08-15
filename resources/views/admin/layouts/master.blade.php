<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{asset('assetsAdmin/assets/img/favicon.ico')}}"/>
    <link href="{{asset('assetsAdmin/assets/css/loader.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assetsAdmin/assets/js/loader.js)')}}}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('assetsAdmin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assetsAdmin/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{asset('assetsAdmin/plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assetsAdmin/assets/css/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    @yield('css')
</head>

@include('admin.layouts.header')
@section('loader')
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div></div></div>
    <!--  END LOADER -->
@endsection

<!--  BEGIN SIDEBAR  -->
@include('admin.layouts.sidebar')
<!--  END SIDEBAR  -->

<!--  BEGIN CONTENT AREA  -->
@yield('content')
<!--  END CONTENT AREA  -->

</div>
<!-- END MAIN CONTAINER -->


@include('admin.layouts.footer')
</body>
</html>
