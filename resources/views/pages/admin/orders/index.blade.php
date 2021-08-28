@extends('layouts.admin')
@section('description')
@endsection
@section('keywords')
@endsection
@section('title')
    {{ "Orders | ".config('app.name') }}
@endsection
@section('breadcrumbs')
    <form action="{{ route('admin.orders.destroy') }}" method="post">
        @csrf
        @method('DELETE')
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Orders</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Orders</a></li>
                            <li class="breadcrumb-item active">Orders</li>
                        </ol>
                    </div>
                    <div class="col s2 m6 l6">
                        <div class="right-align">
{{--                            <a href="{{ route('admin.customers.create') }}" class="btn-floating btn-small waves-effect waves-light breadcrumbs-btn tooltipped @cannot('user-create') disabled @endcannot" data-position="left" data-tooltip="Create"><i class="material-icons">add</i></a>--}}
                            <a href="#deleteModal" class="modal-trigger btn-floating btn-small waves-effect waves-light btn-flat breadcrumbs-btn tooltipped @cannot('order-delete') disabled @endcannot" data-position="left" data-tooltip="Delete"><i class="material-icons">delete</i></a>
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
                                            <input id="allCheckboxInputForOrder" class="custom-checkbox" type="checkbox" onclick="$('input[name*=\'selected_id\']').prop('checked', this.checked);"/>
                                        </th>
                                        <th>ID</th>
                                        <th>Customer</th>
                                        <th>Transaction Type</th>
                                        <th>Pay Status</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Date Added</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>
                                                <input id="{{ 'checkboxInputForOrder'.$order->id }}" class="custom-checkbox" type="checkbox" name="selected_id[]" value={{$order->id}}>
                                            </td>
                                            <td>#{{ $order->id }}</td>
                                            <td>
                                                <span>{{ $order->customer->name ?? '' }}<br>{{ $order->customer->phone ?? '' }}</span>
                                            </td>
                                            <td>
                                                    <span class="chip green lighten-5">
                                                    <span class="{{ $order->transaction_type == 1 ? "red-text" : "green-text" }}">{{ $order->transaction_type == 1 ? "Card" : "Cash" }}</span>
                                                    </span>
                                            </td>
                                            <td>
                                                 <span class="chip green lighten-5">
                                                    <span class="{{ $order->pay_status == 1 ? "red-text" : "black-text" }}">{{ $order->pay_status == 1 ? "Paid" : "Unpaid" }}</span>
                                                    </span>
                                            </td>
                                            <td>
                                                <span>{{number_format($order->total, 2)}}</span>
                                            </td>
                                            <td>
                                                @if($order->status === 0)
                                                    <span class="chip red lighten-5">
                                                    <span class="red-text">Pending</span>
                                                </span>
                                                @elseif($order->status == 1)
                                                    <span class="chip green lighten-5">
                                                    <span class="green-text">Accepted</span>
                                                </span>
                                                @elseif($order->status == 2)
                                                    <span class="chip green lighten-5">
                                                    <span class="green-text">Shipped</span>
                                                </span>
                                                @elseif($order->status == 3)
                                                    <span class="chip green lighten-5">
                                                    <span class="green-text">Delivered</span>
                                                </span>
                                                @elseif($order->status == 4)
                                                    <span class="chip red lighten-5">
                                                    <span class="red-text">Canceled</span>
                                                </span>
                                                @endif
                                            </td>

                                            <td>
                                                <span>{{ $order->created_at->format('d-m-Y') }}</span>
                                            </td>
                                            <td class="row">
                                                <a class="dropdown-trigger grey-text" data-target="{{ "dropdown-$order->id" }}">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <ul id="{{ "dropdown-$order->id" }}" class="dropdown-content grey-text">
                                                    <li><a href="{{ route('admin.orders.show', $order->id) }}" @cannot('order-view') style="pointer-events: none; color: #e1e1e1;" @endcannot>View</a></li>
{{--                                                    <li><a href="#" @cannot('order-update') style="pointer-events: none; color: #e1e1e1;" @endcannot data-route="{{ route('admin.orders.update', $order->id) }}" onclick="initUpdateModal">Update Status</a></li>--}}
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
                                        {{ $orders->links('vendor.pagination.materialize') }}
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
            $('.modal').modal();
        });
    </script>
    <!-- Customer listing related script end -->
@endsection
