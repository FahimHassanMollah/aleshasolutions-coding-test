@extends('layouts.admin')
@section('description')
@endsection
@section('keywords')
@endsection
@section('title')
    {{ "Customers | ".config('app.name') }}
@endsection
@section('breadcrumbs')
{{--    <form action="{{ route('admin.users.destroy') }}" method="post">--}}
    <form action="#" method="post">
        @csrf
        @method('DELETE')
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Customer</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Customers</a></li>
                            <li class="breadcrumb-item active">Customers</li>
                        </ol>
                    </div>
                    <div class="col s2 m6 l6">
                        <div class="right-align">
{{--                            <a href="{{ route('admin.customers.create') }}" class="btn-floating btn-small waves-effect waves-light breadcrumbs-btn tooltipped @cannot('user-create') disabled @endcannot" data-position="left" data-tooltip="Create"><i class="material-icons">add</i></a>--}}
{{--                            <a href="#deleteModal" class="modal-trigger btn-floating btn-small waves-effect waves-light btn-flat breadcrumbs-btn tooltipped @cannot('user-delete') disabled @endcannot" data-position="left" data-tooltip="Delete"><i class="material-icons">delete</i></a>--}}
                                <a href="#" class="btn-floating btn-small waves-effect waves-light breadcrumbs-btn tooltipped @cannot('user-create') disabled @endcannot" data-position="left" data-tooltip="Create"><i class="material-icons">add</i></a>
                                <a href="#" class="modal-trigger btn-floating btn-small waves-effect waves-light btn-flat breadcrumbs-btn tooltipped @cannot('user-delete') disabled @endcannot" data-position="left" data-tooltip="Delete"><i class="material-icons">delete</i></a>
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
                                            <input id="allCheckboxInputForCustomer" class="custom-checkbox" type="checkbox" onclick="$('input[name*=\'selected_id\']').prop('checked', this.checked);"/>
                                        </th>
                                        <th>Customer</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Date Added</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($customers as $customer)
                                        <tr>
                                            <td>
                                                <input id="{{ 'checkboxInputForCustomer'.$customer->id }}" class="custom-checkbox" type="checkbox" name="selected_id[]" value={{$customer->id}}>
                                            </td>
                                            <td>
                                                <span>{{ $customer->name ?? '' }}</span>
                                            </td>
                                            <td>
                                                <span>{{ $customer->email ?? "" }}</span>
                                            </td>
                                            <td>
                                                <span>{{ $customer->phone ?? "" }}</span>
                                            </td>
                                            <td>
                                                <span>{{ $customer->address ?? "" }}</span>
                                            </td>
                                            <td>
                                                @if($customer->status == 0)
                                                    <span class="chip red lighten-5">
                                                    <span class="red-text">Inactive</span>
                                                </span>
                                                @elseif($customer->status == 1)
                                                    <span class="chip green lighten-5">
                                                    <span class="green-text">Active</span>
                                                </span>
                                                @elseif($customer->status == 2)
                                                    <span class="chip red lighten-5">
                                                    <span class="red-text">Suspend</span>
                                                </span>
                                                @endif
                                            </td>

                                            <td>
                                                <span>{{ $customer->created_at->format('d-m-Y') }}</span>
                                            </td>
                                            <td class="row">
                                                <a class="dropdown-trigger grey-text" data-target="{{ "dropdown-$customer->id" }}">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <ul id="{{ "dropdown-$customer->id" }}" class="dropdown-content grey-text">
{{--                                                    <li><a href="{{ route('admin.users.show', $user->id) }}" @cannot('user-view') style="pointer-events: none; color: #e1e1e1;" @endcannot>View</a></li>--}}
                                                    <li><a href="#">View</a></li>
{{--                                                    <li><a href="{{ route('admin.users.edit', $user->id) }}" @cannot('user-update') style="pointer-events: none; color: #e1e1e1;" @endcannot>Edit</a></li>--}}
                                                    <li><a href="#">Edit</a></li>
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
                                        {{ $customers->links('vendor.pagination.materialize') }}
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
    <!-- Customer listing related script start -->
    <script>
        $(document).ready(function(){
            $('.modal').modal();
            $('.dropdown-trigger').dropdown({
                alignment: 'right',
                constrainWidth: false
            });
        });
    </script>
    <!-- Customer listing related script end -->
@endsection
