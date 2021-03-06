@extends('layouts.admin')
@section('description')
@endsection
@section('keywords')
@endsection
@section('title')
    {{ "Order View | ".config('app.name')}}
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
                    <h5 class="breadcrumbs-title mt-0 mb-0"><span>Orders</span></h5>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Orders</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Orders</a></li>
                        <li class="breadcrumb-item active">View</li>
                    </ol>
                </div>
                <div class="col s2 m6 l6">
                    <div class="right-align">
{{--                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn-floating btn-small waves-effect waves-light breadcrumbs-btn tooltipped @cannot('product-update') disabled @endcannot" data-position="left" data-tooltip="Edit"><i class="material-icons">edit</i></a>--}}
                        <a href="#updateStatusModal" class="modal-trigger btn-floating btn-small waves-effect waves-light breadcrumbs-btn tooltipped  @cannot('product-update') disabled @endcannot" data-position="left" data-tooltip="Edit Status"><i class="material-icons">edit</i></a>
                        <a href="{{ route('admin.orders.index') }}" class="modal-trigger btn-floating btn-small waves-effect waves-light btn-flat breadcrumbs-btn tooltipped @cannot('product-view-any') disabled @endcannot" data-position="left" data-tooltip="Back"><i class="material-icons">backspace</i></a>
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
                        <h4>Order ID: # {{ $order->id }}</h4>
                        <div>
                            <h6>Customer: {{ $order->customer->name ?? "Not Found" }}</h6>
                            <p>Phone: {{ $order->customer->phone ?? "Not Found" }}</p>
                            <p>Address: {{ $order->customer->address ?? "Not Found" }}</p>
                        </div>
                        <div>
                            <h6>Pay Details</h6>
                            <strong>Transaction Type: </strong>
                            <span class="chip green lighten-5">
                                <span class="{{ $order->transaction_type == 1 ? "red-text" : "green-text" }}">{{ $order->transaction_type == 1 ? "Card" : "Cash" }}</span>
                            </span>
                            <strong>Payment Status:</strong>
                            <span class="chip green lighten-5">
                                <span class="{{ $order->pay_status == 1 ? "red-text" : "black-text" }}">{{ $order->pay_status == 1 ? "Paid" : "Unpaid" }}</span>
                            </span>
                            <strong>Total:</strong>
                            <span class="chip green lighten-5">
                            <span class="red-text">{{ number_format($order->total, 2) }}</span>
                            </span>
                        </div>
                        <div>
                            <h6>Order Details</h6>
                            <table>
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th class="right">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach(json_decode($order->details)->items as $item)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="valign-wrapper">
                                            <span><img src="{{ $item->image ? asset('storage')."/".$item->image : asset('app-assets/images/gallery/no-image.png') }}" class="responsive-img" alt="" width="50px" height="50px"></span>
                                            <span>{{ $item->name}}</span>
                                        </td>
                                        <td>
                                            {{ $item->quantity }}
                                        </td>
                                        <td>
                                            {{ number_format($item->price, 2) }}
                                        </td>
                                        <td class="right">
                                            {{ number_format($item->subtotal, 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col s12">
                                    <div class="col m5 s12">

                                        <h6>Order At: {{ $order->created_at }}</h6>
                                        <div>
                                            <h6>Status:
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
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col xl4 m7 s12 offset-xl3">
                                        <ul>
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">Subtotal</span>
                                                <h6 class="invoice-subtotal-value">$ {{ number_format(json_decode($order->details)->subtotal , 2)}}</h6>
                                            </li>
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">Discount</span>
                                                <h6 class="invoice-subtotal-value">- $ {{ number_format(json_decode($order->details)->discount, 2) }}</h6>
                                            </li>
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">Delivery Charge</span>
                                                <h6 class="invoice-subtotal-value" v-model="orderDetails.deliveryCharge">$ {{ number_format(json_decode($order->details)->delivery_charge, 2) }}</h6>
                                            </li>
                                            <li class="divider mt-2 mb-2"></li>
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">Invoice Total</span>
                                                <h6 class="invoice-subtotal-value" v-model="orderDetails.total" >$ {{ number_format(json_decode($order->details)->total, 2) }}</h6>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-overlay"></div>
    </div>

    <!-- update Status modal Structure -->
    <div id="updateStatusModal" class="modal">
        <form action="{{ route('admin.orders.update', $order->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="row">
                    <div class="col s12">
                        <div class="input-field col s12">
                            <select name="status">
                                <option value="0" {{ $order->status === 0 ? "selected" : '' }}>Pending</option>
                                <option value="1" {{ $order->status === 1 ? "selected" : '' }}>Accept</option>
                                <option value="2" {{ $order->status === 2 ? "selected" : '' }}>Shipped</option>
                                <option value="3" {{ $order->status === 3 ? "selected" : '' }}>Delivered</option>
                                <option value="4" {{ $order->status === 4 ? "selected" : '' }}>Cancelled</option>
                            </select>
                            <label>Order Status</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <button type="submit" class="right btn btn-small modal-close waves-effect waves-green">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('page-vendor-script')
@endsection
@section('page-level-js')
    <script>
        $(document).ready(function(){
            $('.modal').modal();
        });
    </script>
@endsection
