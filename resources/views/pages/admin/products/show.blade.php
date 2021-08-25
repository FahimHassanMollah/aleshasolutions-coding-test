@extends('layouts.admin')
@section('description')
@endsection
@section('keywords')
@endsection
@section('title')
    {{ "Product View | ".config('app.name')}}
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
                    <h5 class="breadcrumbs-title mt-0 mb-0"><span>Products</span></h5>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Catalog</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></li>
                        <li class="breadcrumb-item active">View</li>
                    </ol>
                </div>
                <div class="col s2 m6 l6">
                    <div class="right-align">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn-floating btn-small waves-effect waves-light breadcrumbs-btn tooltipped @cannot('product-update') disabled @endcannot" data-position="left" data-tooltip="Edit"><i class="material-icons">edit</i></a>
                        <a href="{{ route('admin.products.index') }}" class="modal-trigger btn-floating btn-small waves-effect waves-light btn-flat breadcrumbs-btn tooltipped @cannot('product-view-any') disabled @endcannot" data-position="left" data-tooltip="Back"><i class="material-icons">backspace</i></a>
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
                        @if(json_decode($product->image))
                        <div class="masonry-gallery-wrapper">
                            <div class="popup-gallery">
                                <div class="gallery-sizer"></div>
                                <div class="row">
                                    @foreach(json_decode($product->image) as $image)
                                    <div class="col s12 m6 l4 xl2">
{{--                                        <a href="{{ $image ? asset("storage/$image") : asset('app-assets/images/gallery/no-image.png') }}" title="The Cleaner">--}}
                                            <img src="{{ $image ? asset("storage/$image") : asset('app-assets/images/gallery/no-image.png') }}" class="responsive-img mb-10" alt="">
{{--                                        </a>--}}
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @else
                            <img src="{{ asset('app-assets/images/gallery/no-image.png') }}" class="responsive-img" style="border-color: #0b0b0b!important;" alt="">

                        @endif
                    </div>
                    <div class="row">
                        <h4>{{ $product->name }}</h4>
                        <div>
                            <h6>Description: </h6>
                            {!! $product->description !!}
                        </div>
                        <div>
                            <h6>Price: {{ number_format($product->price, 2) }}</h6>
                        </div>
                        <div>
                            <strong>Status: </strong>
                            <span class="chip {{ $product->status ? 'green-text green lighten-5' : 'red-text red lighten-5' }} ">{{ $product->status ? 'Active' : 'Inactive'}}</span>
                        </div>
                        <div>
                            @if($product->categories)
                                <strong>Categories: </strong>
                                @foreach($product->categories as $category)
                                    @if($category->name)
                                        <span class="chip green-text green lighten-5">{{ $category->name }}</span>
                                    @endif
                                @endforeach
                            @endif
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
    <script src="{{ asset('app-assets/js/scripts/media-gallery-page.js') }}"></script>
@endsection
