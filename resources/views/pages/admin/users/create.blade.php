@extends('layouts.admin')
@section('description')
@endsection
@section('keywords')
@endsection
@section('title')
    {{ "Create User | ".config('app.name') }}
@endsection
@section('vendor-css')
@endsection
@section('page-level-css')
@endsection
@section('breadcrumbs')
    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Users</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">System</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div>
                    <div class="col s2 m6 l6">
                        <div class="right-align">
                            <button type="submit" class="btn-floating btn-small waves-effect waves-light breadcrumbs-btn tooltipped @cannot('user-create') disabled @endcannot" data-position="left" data-tooltip="Save"><i class="material-icons">save</i></button>
                            <a href="{{ route('admin.users.index') }}" class="modal-trigger btn-floating btn-small waves-effect waves-light btn-flat breadcrumbs-btn tooltipped @cannot('user-view-any') disabled @endcannot" data-position="left" data-tooltip="Cancel"><i class="material-icons">backspace</i></a>
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
                        <div class="card">
                            <div class="card-content">
                                <h6 class="mb-3"><i class="material-icons small mr-1">create</i>Add User</h6>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <select name="user_group_id" id="userGroupId">
                                            <option value="" disabled>Choose user group</option>
                                            <option value="" {{ old('user_group_id') === null ? 'selected' : '' }}>None</option>
                                            @foreach($user_groups as $user_group)
                                                <option value="{{ $user_group->id }}" {{ old('user_group_id') == $user_group->id ? 'selected' : '' }}>{{ $user_group->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="userGroupId">User Group <i class="material-icons small tooltipped" data-position="right" data-tooltip="Role of the user">info</i></label>
                                        @if($errors->has('user_group_id'))
                                            <span class="red-text">{{ $errors->first('user_group_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <select name="title" id="title">
                                            <option value="" disabled selected>Choose title</option>
                                            <option value="Mr" {{ old('title') == 'Mr' ? 'selected' : ''}}>Mr</option>
                                            <option value="Mrs" {{ old('title') == 'Mrs' ? 'selected' : ''}}>Mrs</option>
                                            <option value="Ms" {{ old('title') == 'Ms' ? 'selected' : ''}}>Ms</option>
                                            <option value="Miss" {{ old('title') == 'Miss' ? 'selected' : ''}}>Miss</option>
                                        </select>
                                        <label for="title">Title *</label>
                                        @if($errors->has('title'))
                                            <span class="red-text">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="first_name" value="{{ old('first_name') }}" placeholder="First Name *" id="firstName" class="active" type="text" maxlength="30" data-length="30">
                                        <label for="firstName">First Name</label>
                                        @if($errors->has('first_name'))
                                            <span class="red-text">{{ $errors->first('first_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="last_name" value="{{ old('last_name') }}" placeholder="Surname" id="lastName" class="active" type="text" maxlength="30" data-length="30">
                                        <label for="lastName">Last Name</label>
                                        @if($errors->has('last_name'))
                                            <span class="red-text">{{ $errors->first('last_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="email" type="email" value="{{ old('email') }}" placeholder="Email Address *" id="email" class="active"  maxlength="50" data-length="50">
                                        <label for="email">Email</label>
                                        @if($errors->has('email'))
                                            <span class="red-text">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="password" placeholder="Password *" id="password" type="password">
                                        <label for="password">Password</label>
                                        @if($errors->has('password'))
                                            <span class="red-text">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="password_confirmation" placeholder="Password Confirmation *" id="passwordConfirmation" type="password">
                                        <label for="passwordConfirmation">Confirm Password</label>
                                        @if($errors->has('password_confirmation'))
                                            <span class="red-text">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <select name="status" id="status">
                                            <option value="" disabled>Choose status</option>
                                            <option value="1" {{ old('status') == 1 ? 'selected' : ''}}>Active</option>
                                            <option value="0" {{ old('status') == '0' ? 'selected' : ''}} >Inactive</option>
                                        </select>
                                        <label for="status">Status</label>
                                        @if($errors->has('status'))
                                            <span class="red-text">{{ $errors->first('status') }}</span>
                                        @endif
                                    </div>
                                </div>
                                @if(Auth::user()->super_admin)
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <p>
                                                <label for="superAdmin">
                                                    <input id="superAdmin" type="checkbox" value="1" name="super_admin" {{ old('super_admin') == 1 ? 'checked' : '' }}/>
                                                    <span>Super Admin<i class="material-icons small tooltipped" data-position="right" data-tooltip="Super Admin can access everything without any permissions.">info</i></span>
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="file-field input-field s12">
                                        <div class="btn float-right">
                                            <span>Avatar</span>
                                            <input type="file" name="avatar" value="{{ old('avatar') }}">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                        @if($errors->has('avatar'))
                                            <span class="red-text">{{ $errors->first('avatar') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-overlay"></div>
            </div>
    </form>
@endsection
@section('page-vendor-script')
    <script src="{{ asset('app-assets/vendors/filepond/filepond.js') }}"></script>
@endsection
@section('page-level-js')
    <!-- user create form related script start -->
    <script>
        $(document).ready(function() {
            $('input#firstName, input#lastName, input#email').characterCounter();
            M.updateTextFields();
        });
    </script>
    <!-- user create form related script end -->
@endsection
