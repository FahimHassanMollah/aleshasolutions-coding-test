@extends('layouts.admin')
@section('description')
@endsection
@section('keywords')
@endsection
@section('title')
    {{ config('app.name')." | Admin: Edit User Group" }}
@endsection
@section('vendor-css')
@endsection
@section('page-level-css')
@endsection
@section('breadcrumbs')
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title mt-0 mb-0"><span>User Groups (Roles)</span></h5>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">System</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.userGroups.index') }}">User Groups</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
                <div class="col s2 m6 l6">
                    <div class="right-align">
                        <a href="#updateConfirmModal" class="modal-trigger btn-floating btn-small waves-effect waves-light breadcrumbs-btn tooltipped @cannot('user-group-update') disabled @endcannot" data-position="left" data-tooltip="Update"><i class="material-icons">update</i></a>
                        <a href="{{ route('admin.userGroups.index') }}" class="btn-floating btn-small waves-effect waves-light btn-flat breadcrumbs-btn tooltipped @cannot('user-group-view-any') disabled @endcannot" data-position="left" data-tooltip="Cancel"><i class="material-icons">backspace</i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <form action="{{ route('admin.userGroups.update', $userGroup->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="col s12">
            <div class="container ">
                <div class="section">
                    <div class="card">
                        <div class="card-content">
                            <h6 class="mb-3"><i class="material-icons small vertical-align-bottom mr-1">edit</i>Edit User Group</h6>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="name" value="{{ $userGroup->name }}" placeholder="User Group Name *" id="name" class="active" type="text" maxlength="30" data-length="30">
                                    <label for="name">User Group Name <i class="material-icons small tooltipped" data-position="right" data-tooltip="Role name of the user">info</i></label>
                                    @if($errors->has('name'))
                                        <span class="red-text">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <h3 class="card-title center-align">Assign Permissions</h3>
                                <p class="center-align col s12">
                                    <label>
                                        <input type="checkbox" id="allCheckboxInputForPermission" onclick="$('input[name*=\'user_permission_id\']').prop('checked', this.checked);"/>
                                        <span>Select / Unselect all Permissions</span>
                                    </label>
                                </p>
                            </div>
                            @foreach($assignedUserPermissions as $userPermissionGroup)
                                @if($userPermissionGroup['user_permission_group_name'])
                                    <div class="row">
                                        <div class="col s12 mb-2">
                                            <h4 class="card-title">{{ $userPermissionGroup['user_permission_group_name']['name']}}</h4>
                                            @if($userPermissionGroup['user_permissions'])
                                                @foreach($userPermissionGroup['user_permissions'] as $userPermission)
                                                    <span class="col s12 m3 l4">
                                                    <label>
                                                        <input type="checkbox" name="{{ "user_permission_id[]" }}" value="{{ $userPermission['id'] }}" {{ $userPermission['is_assign'] ? 'checked' : ''}}/>
                                                        <span>{{ $userPermission['name'] }}</span>
                                                    </label>
                                                </span>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-overlay"></div>
        </div>
        <!-- update confirm modal -->
        @include('partials.pages.admin.update-confirm-modal')
    </form>
@endsection
@section('page-vendor-script')
@endsection
@section('page-level-js')
    <!-- userGroup update form related script start -->
    <script>
        $(document).ready(function() {
            $('.modal').modal();
            $('input#name').characterCounter();
            M.updateTextFields();
        });
    </script>
    <!-- userGroup update form related script end -->
@endsection
