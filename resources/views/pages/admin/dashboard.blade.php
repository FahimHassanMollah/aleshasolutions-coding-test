@extends('layouts.admin')
@section('description')
@endsection
@section('keywords')
@endsection
@section('title')
@endsection
@section('vendor-css')
@endsection
@section('page-level-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/dashboard-modern.css') }}">
@endsection
@section('breadcrumbs')
@endsection
@section('content')
    <div class="col s12">
        <div class="container">
            <div class="section">
                <div class="card">
                    <div class="card-content">
                        <p class="caption mb-0">
                            Welcome to Admin Dashboard.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-overlay"></div>
    </div>
@endsection

@section('page-vendor-script')
@endsection
@section('page-level-js')
    <script src="{{ asset('app-assets/js/scripts/dashboard-modern.js') }}"></script>
@endsection
