@extends('layouts.admin')
@section('description')
@endsection
@section('keywords')
@endsection
@section('title')
    {{ config('app.name')." | Admin: Show User Group" }}
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
                        <li class="breadcrumb-item active">Show</li>
                    </ol>
                </div>
                <div class="col s2 m6 l6">
                    <div class="right-align">
                        <a href="{{ route('admin.userGroups.edit', $userGroup->id) }}" class="btn-floating btn-small waves-effect waves-light breadcrumbs-btn tooltipped @cannot('user-group-update') disabled @endcannot" data-position="left" data-tooltip="Edit"><i class="material-icons">edit</i></a>
                        <a href="{{ route('admin.userGroups.index') }}" class="btn-floating btn-small waves-effect waves-light btn-flat breadcrumbs-btn tooltipped @cannot('user-group-view-any') disabled @endcannot" data-position="left" data-tooltip="Back to index"><i class="material-icons">backspace</i></a>
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
                        <h6 class="mb-3"><i class="material-icons mr-1 vertical-align-bottom small">info_outline</i>User Group Details</h6>
                        <div class="row">
                            <div class="col s12 mb-2">
                                <table class="striped">
                                    <tbody>
                                    <tr>
                                        <td>User Group Name: </td>
                                        <td>{{ $userGroup->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Date Added: </td>
                                        <td>{{ $userGroup->created_at->format('d-m-Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Last Updated:  </td>
                                        <td>{{ $userGroup->updated_at->format('d-m-Y') }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <h6 class="mb-3"><i class="material-icons mr-1 vertical-align-bottom small">link</i>Assigned Permissions</h6>
                        <div class="row">
                            @foreach($assignedUserPermissions as $userPermissionGroup)
                                @if($userPermissionGroup['user_permission_group_name'])
                                    <div class="col s12 mb-2">
                                        <h5 class="card-title">{{ $userPermissionGroup['user_permission_group_name']['name']}}</h5>
                                        @if($userPermissionGroup['user_permissions'])
                                            @foreach($userPermissionGroup['user_permissions'] as $userPermission)
                                                <span class="chip {{ $userPermission['is_assign'] ? 'green-text green lighten-5' : 'red-text red lighten-5' }} ">{{ $userPermission['name'] }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                @endif
                            @endforeach
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
