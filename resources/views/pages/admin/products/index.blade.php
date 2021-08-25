@extends('layouts.admin')
@section('description')
@endsection
@section('keywords')
@endsection
@section('title')
    {{ "Products | ".config('app.name') }}
@endsection
@section('breadcrumbs')
    <form action="{{ route('admin.products.destroy') }}" method="post">
        @csrf
        @method('DELETE')
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Products</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Catalog</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div>
                    <div class="col s2 m6 l6">
                        <div class="right-align">
                            <a href="{{ route('admin.products.create') }}" class="btn-floating btn-small waves-effect waves-light breadcrumbs-btn tooltipped @cannot('product-create') disabled @endcannot" data-position="left" data-tooltip="Create"><i class="material-icons">add</i></a>
                            <a href="#deleteModal" class="modal-trigger btn-floating btn-small waves-effect waves-light btn-flat breadcrumbs-btn tooltipped @cannot('product-delete') disabled @endcannot" data-position="left" data-tooltip="Delete"><i class="material-icons">delete</i></a>
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
                                <div class="row">
                                    <form action="{{ route('admin.products.index') }}" method="get">
                                        <div class="col s12 m10">
                                            <input type="text" name="name" placeholder="Search by Product name">
                                        </div>
                                        <div class="col s12 m2">
                                            <button type="submit" class="btn btn-small waves-effect waves-light ">Search Product</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <table class="centered responsive-table">
                                    <thead>
                                    <tr>
                                        <th>
                                            <input id="allCheckboxInputForProduct" class="custom-checkbox" type="checkbox" onclick="$('input[name*=\'selected_id\']').prop('checked', this.checked);"/>
                                        </th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Categories</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>
                                                <input id="{{ 'checkboxInputForProduct'.$product->id }}" class="custom-checkbox" type="checkbox" name="selected_id[]" value={{$product->id}}>
                                            </td>
                                            <td>
                                                <span>{{$product->name?? ''}}</span>
                                            </td>
                                            <td>
                                                <span>{!! $product->description !!}</span>
                                            </td>
                                            <td>
                                                <span class="right">{{ number_format($product->price, 2) }}</span>
                                            </td>
                                            <td>
                                                @if($product->categories)
                                                    @foreach($product->categories as $category)
                                                        <span class="chip green-text green lighten-5">{{ $category->name ?? '' }}</span>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <img class="materialboxed" width="100" src="{{ json_decode($product->image) ? asset("storage")."/".json_decode($product->image)[0] : asset('app-assets/images/gallery/no-image.png') }}">
                                            </td>
                                            <td>
                                                <span>{{ $product->status ? "Active" : "Inactive" }}</span>
                                            </td>
                                            <td class="row">
                                                <a class="dropdown-trigger grey-text" data-target="{{ "dropdown-$product->id" }}">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <ul id="{{ "dropdown-$product->id" }}" class="dropdown-content grey-text">
                                                    <li><a href="{{ route('admin.products.show', $product->id) }}" @cannot('product-view') style="pointer-events: none; color: #e1e1e1;" @endcannot>View</a></li>
                                                    <li><a href="{{ route('admin.products.edit', $product->id) }}" @cannot('product-update') style="pointer-events: none; color: #e1e1e1;" @endcannot>Edit</a></li>
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
                                        {{ $products->links('vendor.pagination.materialize') }}
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
    <!-- Product listing related script start -->
    <script>
        $(document).ready(function(){
            $('.modal').modal();
            $('.dropdown-trigger').dropdown({
                alignment: 'right',
                constrainWidth: false
            });
        });
    </script>
    <!-- Product listing related script end -->
@endsection
