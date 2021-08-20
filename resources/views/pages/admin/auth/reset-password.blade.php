@extends('layouts.admin-auth')
@section('meta-description')
@endsection
@section('meta-keywords')
@endsection
@section('title')
    {{ "Reset Password | ".config('app.name', "Test Coding") }}
@endsection
@section('page-level-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/register.css') }}">
@endsection
@section('content')
    <body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 1-column register-bg   blank-page blank-page" data-open="click" data-menu="vertical-modern-menu" data-col="1-column">
        <div class="row">
            <div class="col s12">
                <div class="container">
                    <div id="register-page" class="row">
                        <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 register-card bg-opacity-8">
                            <form class="login-form" method="POST" action="{{ route('admin.password.update') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <h5 class="ml-4">Reset Password</h5>
                                        <p class="ml-4">Please, reset your password.</p>
                                    </div>
                                </div>
                                <div class="row margin">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix pt-2">mail_outline</i>
                                        <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}">
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="row margin">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix pt-2">lock_outline</i>
                                        <input id="password" type="password" name="password">
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <div class="row margin">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix pt-2">lock_outline</i>
                                        <input id="password-confirmation" type="password" name="password_confirmation">
                                        <label for="password-confirmation">Confirm Password</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Reset Password</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <p class="margin medium-small"><a href="{{ route('admin.login') }}">Login</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="content-overlay"></div>
            </div>
        </div>
    </body>
@endsection
@section('page-vendor-script')
@endsection
@section('page-level-js')
@endsection
