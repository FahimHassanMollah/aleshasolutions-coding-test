@extends('layouts.admin')
@section('description')
@endsection
@section('keywords')
@endsection
@section('title')
    {{ "Create Category | ".config('app.name') }}
@endsection
@section('vendor-css')
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/select2/select2.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/select2/select2-materialize.css') }}" type="text/css">
@endsection
@section('page-level-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/form-select2.css') }}">
@endsection
@section('breadcrumbs')
    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Users</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Catalog</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div>
                    <div class="col s2 m6 l6">
                        <div class="right-align">
                            <button type="submit" class="btn-floating btn-small waves-effect waves-light breadcrumbs-btn tooltipped @cannot('category-create') disabled @endcannot" data-position="left" data-tooltip="Save"><i class="material-icons">save</i></button>
                            <a href="{{ route('admin.categories.index') }}" class="modal-trigger btn-floating btn-small waves-effect waves-light btn-flat breadcrumbs-btn tooltipped @cannot('category-view-any') disabled @endcannot" data-position="left" data-tooltip="Cancel"><i class="material-icons">backspace</i></a>
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
                                <h6 class="mb-3"><i class="material-icons small mr-1">create</i>Add Category</h6>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="name" value="{{ old('name') }}" placeholder="Category Name *" id="name" class="active" type="text" maxlength="30" data-length="30">
                                        <label for="name">Category Name</label>
                                        @if($errors->has('name'))
                                            <span class="red-text">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <select class="select2" name="category_id" id="categoryId">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                @foreach($category->childCategories as $childCategory)
                                                    <option value="{{ $childCategory->id }}" {{ old('category_id') == $childCategory->id ? 'selected' : '' }}>-- {{ $childCategory->name }}</option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                        <label for="categoryId">Parent Category</label>
                                        @if($errors->has('category_id'))
                                            <span class="red-text">{{ $errors->first('category_id') }}</span>
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
    <script src="{{ asset('app-assets/vendors/select2/select2.full.min.js') }}"></script>
@endsection
@section('page-level-js')
    <script src="{{ asset('app-assets/vendors/select2/select2.full.min.js') }}"></script>
    <!-- category create form related script start -->
    <script>
        $(document).ready(function() {
            $('input#name').characterCounter();
            M.updateTextFields();
            // Basic Select2 select
            $("#categoryId").select2({
                dropdownAutoWidth: true,
                width: '100%'
            });
        });

    </script>
    <!-- user category form related script end -->
@endsection
