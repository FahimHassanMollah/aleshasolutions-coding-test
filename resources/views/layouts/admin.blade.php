<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="Divas World">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/favicon/apple-touch-icon-152x152.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/favicon/favicon-32x32.png') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/vendors.min.css') }}">
@yield('vendor-css')
<!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/vertical-modern-menu-template/materialize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/vertical-modern-menu-template/style.css') }}">
@yield(('page-level-css'))
<!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/custom/custom.css') }}">
    <!-- END: Custom CSS-->
    @yield('style')
</head>
<!-- END: Head-->
<body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 2-columns" data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">

<!-- BEGIN: Header-->
@include('partials.layouts.admin.header')
<!-- END: Header-->



<!-- BEGIN: SideNav-->
@include('partials.layouts.admin.side-nave')
<!-- END: SideNav-->

<!-- BEGIN: Page Main-->
<div id="main">
    <div class="row">
        <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        @yield('breadcrumbs')
        @yield('content')
    </div>
</div>
<!-- END: Page Main-->

<!--/ Theme Customizer -->

<!-- BEGIN: Footer-->
@include('partials.layouts.admin.footer')

<!-- END: Footer-->
<!-- BEGIN VENDOR JS-->
<script src="{{ asset('app-assets/js/vendors.min.js') }}"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
@yield('page-vendor-script')
<!-- END PAGE VENDOR JS-->
<!-- BEGIN THEME  JS-->
<script src="{{ asset('app-assets/js/plugins.js') }}"></script>
<script src="{{ asset('app-assets/js/search.js') }}"></script>
<script src="{{ asset('app-assets/js/custom/custom-script.js') }}"></script>
{{--<script src="{{ asset('app-assets/js/scripts/customizer.js') }}"></script>--}}
<!-- END THEME  JS-->
<!-- BEGIN PAGE LEVEL JS-->
@yield('page-level-js')
<!-- END PAGE LEVEL JS-->
<script>
    $(document).ready(function (){
        // get all validation errors and shown at toast.
        let errors = @json($errors->all());
        if (errors){
            errors.forEach(alertNormalToast)
        }

        // get session message passed by controller and shown at toast.
        let message = @json(Session::get('message'));
        if (message){
            alertNormalToast(message);
        }
    });
</script>
</body>
</html>
