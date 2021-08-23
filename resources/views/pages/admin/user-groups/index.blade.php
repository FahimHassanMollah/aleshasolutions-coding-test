@extends('layouts.admin')
@section('description')
@endsection
@section('keywords')
@endsection
@section('title')
    {{ config('app.name')." | Admin: Index User Groups" }}
@endsection
@section('breadcrumbs')
    <form action="{{ route('admin.userGroups.destroy') }}" method="post">
        @csrf
        @method('DELETE')
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>User Groups (Roles)</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">User Group</a></li>
                            <li class="breadcrumb-item active">Index</li>
                        </ol>
                    </div>
                    <div class="col s2 m6 l6">
                        <div class="right-align">
                            <a href="{{ route('admin.userGroups.create') }}" class="btn-floating btn-small waves-effect waves-light breadcrumbs-btn tooltipped @cannot('user-group-create') disabled @endcannot" data-position="left" data-tooltip="Create"><i class="material-icons">add</i></a>
                            <a href="#deleteModal" class="modal-trigger btn-floating btn-small waves-effect waves-light btn-flat breadcrumbs-btn tooltipped @cannot('user-group-delete') disabled @endcannot" data-position="left" data-tooltip="Delete"><i class="material-icons">delete</i></a>
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
                                            <input id="allCheckboxInputForUserGroup" class="custom-checkbox" type="checkbox" onclick="$('input[name*=\'selected_id\']').prop('checked', this.checked);"/>
                                        </th>
                                        <th>User Group Name</th>
                                        <th>Date Added</th>
                                        <th>Last Updated</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($userGroups as $userGroup)
                                        <tr>
                                            <td>
                                                <input id="{{ 'checkboxInputForUserGroup'.$userGroup->id }}" class="custom-checkbox" type="checkbox" name="selected_id[]" value={{$userGroup->id}}>
                                            </td>
                                            <td>
                                                <span>{{ $userGroup->name }}</span>
                                            </td>
                                            <td>
                                                <span>{{ $userGroup->created_at->format('d-m-Y') }}</span>
                                            </td>
                                            <td>
                                                <span>{{ $userGroup->updated_at->format('d-m-Y') }}</span>
                                            </td>
                                            <td class="row">
                                                <a class="dropdown-trigger grey-text" data-target="{{ "dropdown-$userGroup->id" }}">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <ul id="{{ "dropdown-$userGroup->id" }}" class="dropdown-content grey-text">
                                                    <li><a href="{{ route('admin.userGroups.show', $userGroup->id) }}"  @cannot('user-group-view') style="pointer-events: none; color: #e1e1e1;" @endcannot>View</a></li>
                                                    <li><a href="{{ route('admin.userGroups.edit', $userGroup->id) }}" @cannot('user-group-update') style="pointer-events: none; color: #e1e1e1;" @endcannot>Edit</a></li>
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
                                            {{ $userGroups->links('vendor.pagination.materialize') }}
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
    <!-- userGroup listing related script start -->
    <script>
        $(document).ready(function(){
            $('.modal').modal();
            $('.dropdown-trigger').dropdown({
                alignment: 'right',
                constrainWidth: false
            });
        });
    </script>
    <!-- userGroup listing related script end -->
@endsection
