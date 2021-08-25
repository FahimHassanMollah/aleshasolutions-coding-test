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
    <title>{{ config('app.name') }}</title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/favicon/apple-touch-icon-152x152.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/favicon/favicon-32x32.png') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/noUiSlider/nouislider.min.css') }}">
@yield('vendor-css')
<!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/horizontal-menu-template/materialize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/horizontal-menu-template/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/layouts/style-horizontal.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/eCommerce-products-page.css') }}">
<!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/custom/custom.css') }}">
    <!-- END: Custom CSS-->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<!-- END: Head-->
<body class="horizontal-layout page-header-light horizontal-menu preload-transitions 2-columns   " data-open="click" data-menu="horizontal-menu" data-col="2-columns">
<div class="app">
    <router-view></router-view>
</div>

<!-- BEGIN: Footer-->

<!-- END: Footer-->
<!-- BEGIN VENDOR JS-->
<script src="{{ asset('app-assets/js/vendors.min.js') }}"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{ 'app-assets/vendors/noUiSlider/nouislider.min.js' }}"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN THEME  JS-->
<script src="{{ asset('app-assets/js/plugins.js') }}"></script>
<script src="{{ asset('app-assets/js/search.js') }}"></script>
<script src="{{ asset('app-assets/js/custom/custom-script.js') }}"></script>
{{--<script src="{{ asset('app-assets/js/scripts/customizer.js') }}"></script>--}}
<!-- END THEME  JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{ 'app-assets/js/scripts/advance-ui-modals.js' }}"></script>
<script src="{{ 'app-assets/js/scripts/eCommerce-products-page.js' }}"></script>
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
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
