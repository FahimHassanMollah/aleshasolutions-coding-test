@extends('layouts.admin-auth')
@section('meta-description')
@endsection
@section('meta-keywords')
@endsection
@section('title')
    {{ "Sign In | ".config('app.name', 'Test Coding') }}
@endsection
@section('page-level-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/login.css') }}">
@endsection
@section('content')
    <body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu 1-column login-bg blank-page blank-page" data-open="click" data-menu="vertical-modern-menu" data-col="1-column">
        <div class="row">
            <div class="col s12">
                <div class="container">
                    <div id="login-page" class="row">
                        <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
                            <form class="login-form" action="{{ route('admin.login') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="input-field col s12">
                                        <h5 class="ml-4">Sign in</h5>
                                    </div>
                                </div>
                                <div class="row margin">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix pt-2">person_outline</i>
                                        <input class="active" id="username" name="email" value="{{ old('email') }}" type="email" required autofocus>
                                        <label for="username" class="center-align">Username</label>
                                    </div>
                                </div>
                                <div class="row margin">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix pt-2">lock_outline</i>
                                        <input id="password" name="password" type="password" required autocomplete="current-password">
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m12 l12 mt-1 ">
                                        <p>
                                            <label for="rememberMeInput">
                                                <input id="rememberMeInput" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}/>
                                                <span>Remember Me</span>
                                            </label>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Login</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6 m6 l6">
                                        <p class="margin medium-small"><a href="{{ route('admin.password.request') }}">Forgot password?</a></p>
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
