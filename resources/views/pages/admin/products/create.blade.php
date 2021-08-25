@extends('layouts.admin')
@section('description')
@endsection
@section('keywords')
@endsection
@section('title')
    {{ "Create Product | ".config('app.name') }}
@endsection
@section('vendor-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/quill/quill.snow.css') }}">
@endsection
@section('page-level-css')
@endsection
@section('breadcrumbs')
    <form id="productStoreForm" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Products</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Catalog</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div>
                    <div class="col s2 m6 l6">
                        <div class="right-align">
                            <button type="submit" class="btn-floating btn-small waves-effect waves-light breadcrumbs-btn tooltipped @cannot('product-create') disabled @endcannot" data-position="left" data-tooltip="Save"><i class="material-icons">save</i></button>
                            <a href="{{ route('admin.products.index') }}" class="modal-trigger btn-floating btn-small waves-effect waves-light btn-flat breadcrumbs-btn tooltipped @cannot('product-view-any') disabled @endcannot" data-position="left" data-tooltip="Cancel"><i class="material-icons">backspace</i></a>
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
                                <h6 class="mb-3"><i class="material-icons small mr-1">create</i>Add Product</h6>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="name" value="{{ old('name') }}" placeholder="Product Name *" id="name" class="active" type="text" maxlength="50" data-length="50">
                                        <label for="name">Product Name</label>
                                        @if($errors->has('name'))
                                            <span class="red-text">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea style="display: none" name="description" id="inputDescription"></textarea>
                                        <span>Product Description</span>
                                        <div id="description" style="min-height: 200px;"><p>{!! old('description')  !!}</p></div>
                                    </div>
                                    @if($errors->has('description'))
                                        <span class="red-text">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="price" type="number" value="{{ old('price') }}" placeholder="Product Price *" id="price" class="active" min="0.01" step="0.01">
                                        <label for="email">Product Price</label>
                                        @if($errors->has('price'))
                                            <span class="red-text">{{ $errors->first('price') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <select name="category_id[]" multiple>
                                            <option value="" disabled>select Product Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ in_array($category->id, old('categories', [])) ? 'selected' : '' }}>{{ $category->parentCategory->parentCategory->name }} / {{ $category->parentCategory->name }} / {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <label>Product Category</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <select name="status" id="status">
                                            <option value="" disabled>Choose status</option>
                                            <option value="1" {{ old('status') == 1 ? 'selected' : ''}}>Active</option>
                                            <option value="0" {{ old('status') === 0 ? 'selected' : ''}} >Inactive</option>
                                        </select>
                                        <label for="status">Status</label>
                                        @if($errors->has('status'))
                                            <span class="red-text">{{ $errors->first('status') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="file-field input-field s12">
                                        <div class="btn float-right">
                                            <span>Image</span>
                                            <input type="file" multiple name="image[]" value="{{ old('image') }}">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text" placeholder="Upload one or more image">
                                        </div>
                                        @if($errors->has('image'))
                                            <span class="red-text">{{ $errors->first('image') }}</span>
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
    <script src="{{ asset('app-assets/vendors/quill/quill.min.js') }}"></script>
@endsection
@section('page-level-js')
    <!-- product create form related script start -->
    <script>
        $(document).ready(function() {
            $('input#name').characterCounter();
            M.updateTextFields();
            $('select').formSelect();
        });
        var quill = new Quill('#description', {
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],

                    [{ 'header': 1 }, { 'header': 2 }],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'script': 'sub'}, { 'script': 'super' }],
                    [{ 'indent': '-1'}, { 'indent': '+1' }],
                    [{ 'direction': 'rtl' }],

                    [{'align' : ''}, {'align' : 'center'}, {'align' : 'right'}, {'align' : 'justify'}],

                    ['clean']  // remove formatting button
                ]
            },
            placeholder: 'Product Description here....',
            theme: 'snow'
        });

        $("#productStoreForm").on("submit",function(){
            $("#inputDescription").val(quill.root.innerHTML);
        });
    </script>
    <!-- product create form related script end -->
@endsection
