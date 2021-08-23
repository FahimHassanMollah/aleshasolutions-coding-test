@extends('layouts.admin')
@section('description')
@endsection
@section('keywords')
@endsection
@section('title')
    {{ "User View | ".config('app.name')}}
@endsection
@section('vendor-css')
@endsection
@section('page-level-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/user-profile-page.css') }}">
@endsection
@section('breadcrumbs')
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title mt-0 mb-0"><span>Users</span></h5>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">System</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
                        <li class="breadcrumb-item active">View</li>
                    </ol>
                </div>
                <div class="col s2 m6 l6">
                    <div class="right-align">
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn-floating btn-small waves-effect waves-light breadcrumbs-btn tooltipped @cannot('user-update') disabled @endcannot" data-position="left" data-tooltip="Edit"><i class="material-icons">edit</i></a>
                        <a href="{{ route('admin.users.index') }}" class="modal-trigger btn-floating btn-small waves-effect waves-light btn-flat breadcrumbs-btn tooltipped @cannot('user-view-any') disabled @endcannot" data-position="left" data-tooltip="Back"><i class="material-icons">backspace</i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="col s12">
        <div class="container ">
            <div class="section">
                <div class="card-panel">
                    <div class="row">
                        <div class="col s12 m7">
                            <div class="display-flex media">
                                <a href="#" class="avatar">
                                    <img src="{{ $user->avatar ? asset("storage/$user->avatar") : asset('app-assets/images/avatar/user.png') }}" alt="users view avatar" class="z-depth-4 circle" height="64" width="64">
                                </a>
                                <div class="media-body">
                                    <h6 class="media-heading">
                                        <span class="users-view-name">{{ $user->first_name." ".$user->last_name }}</span>
                                        <span class="grey-text">@</span>
                                        <span class="users-view-username grey-text">{{ $user->userGroup ? $user->userGroup->name : "No User Group (Role)" }}</span>
                                    </h6>
                                    <span>ID:</span>
                                    <span class="users-view-id">{{ $user->id }}</span>
                                    <br>
                                    <span>Email:</span>
                                    <span>{{ $user->email }}</span>
                                    <br>
                                    <span>Super Admin Access:</span>
                                    <span>{{ $user->super_admin ? "Yes" : "No" }}</span>
                                    <br>
                                    <span>Status: </span>
                                    <span>{{ $user->status ? "Active" : "Inactive" }}</span>
                                </div>
                            </div>
                        </div>
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
@endsection
