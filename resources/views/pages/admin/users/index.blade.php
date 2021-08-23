@extends('layouts.admin')
@section('description')
@endsection
@section('keywords')
@endsection
@section('title')
@endsection
@section('breadcrumbs')
    <form action="{{ route('admin.users.destroy') }}" method="post">
        @csrf
        @method('DELETE')
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Users</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">System</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div>
                    <div class="col s2 m6 l6">
                        <div class="right-align">
                            <a href="{{ route('admin.users.create') }}" class="btn-floating btn-small waves-effect waves-light breadcrumbs-btn tooltipped @cannot('user-create') disabled @endcannot" data-position="left" data-tooltip="Create"><i class="material-icons">add</i></a>
                            <a href="#deleteModal" class="modal-trigger btn-floating btn-small waves-effect waves-light btn-flat breadcrumbs-btn tooltipped @cannot('user-delete') disabled @endcannot" data-position="left" data-tooltip="Delete"><i class="material-icons">delete</i></a>
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
                            <table class="centered responsive-table">
                                <thead>
                                <tr>
                                    <th>
                                        <input id="allCheckboxInputForUser" class="custom-checkbox" type="checkbox" onclick="$('input[name*=\'selected_id\']').prop('checked', this.checked);"/>
                                    </th>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th>User Group</th>
                                    <th>Status</th>
                                    <th>Date Added</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <input id="{{ 'checkboxInputForUser'.$user->id }}" class="custom-checkbox" type="checkbox" name="selected_id[]" value={{$user->id}}>
                                        </td>
                                        <td>
                                            <span>{{$user->title ? $user->title.' ' : ''}}{{ $user->first_name ? $user->first_name.' ' : '' }} {{ $user->last_name ? $user->last_name.' ' : '' }}</span>
                                        </td>
                                        <td>
                                            <span>{{ $user->email }}</span>
                                        </td>
                                        <td>
                                            <span>
                                                @if($user->super_admin)
                                                    <span class="chip grey lighten-5">
                                                            <span class="grey-text">Super Admin</span>
                                                    </span>
                                                @elseif($user->UserGroup)
                                                    @if($user->userGroup->name)
                                                        <span class="chip green lighten-5">
                                                            <span class="green-text">{{ $user->UserGroup->name }}</span>
                                                        </span>
                                                    @else
                                                        <span class="chip red lighten-5">
                                                            <span class="red-text">N/A</span>
                                                        </span>
                                                    @endif
                                                @else
                                                    <span class="chip red lighten-5">
                                                        <span class="red-text">None</span>
                                                    </span>
                                                @endif
                                            </span>
                                        </td>
                                        <td>
                                            @if($user->status == 0)
                                                <span class="chip red lighten-5">
                                                    <span class="red-text">Inactive</span>
                                                </span>
                                            @elseif($user->status == 1)
                                                <span class="chip green lighten-5">
                                                    <span class="green-text">Active</span>
                                                </span>
                                            @endif
                                        </td>

                                        <td>
                                            <span>{{ $user->created_at->format('d-m-Y') }}</span>
                                        </td>
                                        <td class="row">
                                            <a class="dropdown-trigger grey-text" data-target="{{ "dropdown-$user->id" }}">
                                                <i class="material-icons">more_vert</i>
                                            </a>
                                            <ul id="{{ "dropdown-$user->id" }}" class="dropdown-content grey-text">
                                                <li><a href="{{ route('admin.users.show', $user->id) }}" @cannot('user-view') style="pointer-events: none; color: #e1e1e1;" @endcannot>View</a></li>
                                                <li><a href="{{ route('admin.users.edit', $user->id) }}" @cannot('user-update') style="pointer-events: none; color: #e1e1e1;" @endcannot>Edit</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <div class="col s12">
                                    <span class="right-align">
                                        {{ $users->links('vendor.pagination.materialize') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-overlay"></div>
        </div>
        <!-- Delete Modal -->
        @include('partials.pages.admin.delete-modal')
    </form>
@endsection
@section('page-vendor-script')
@endsection
@section('page-level-js')
    <!-- user listing related script start -->
    <script>
        $(document).ready(function(){
            $('.modal').modal();
            $('.dropdown-trigger').dropdown({
                alignment: 'right',
                constrainWidth: false
            });
        });
    </script>
    <!-- user listing related script end -->
@endsection
