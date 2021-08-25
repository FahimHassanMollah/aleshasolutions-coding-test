@extends('layouts.admin')
@section('description')
@endsection
@section('keywords')
@endsection
@section('title')
    {{ "Edit Category | ".config('app.name') }}
@endsection
@section('vendor-css')
@endsection
@section('page-level-css')
@endsection
@section('breadcrumbs')
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Categories</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">System</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">categories</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                    <div class="col s2 m6 l6">
                        <div class="right-align">
                            <a href="#updateConfirmModal" class="modal-trigger btn-floating btn-small waves-effect waves-light breadcrumbs-btn tooltipped @cannot('category-update') disabled @endcannot" data-position="left" data-tooltip="Update"><i class="material-icons">update</i></a>
                            <a href="{{ route('admin.categories.index') }}" class="btn-floating btn-small waves-effect waves-light btn-flat breadcrumbs-btn tooltipped @cannot('category-view-any') disabled @endcannot" data-position="left" data-tooltip="Cancel"><i class="material-icons">backspace</i></a>
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
                                <h6 class="mb-3"><i class="material-icons small mr-1">create</i>Edit Category</h6>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="name" value="{{ $category->name }}" placeholder="name *" id="name" class="active" type="text" maxlength="30" data-length="30">
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
                                            @foreach($categories as $categoryLoop)
                                                <option value="{{ $categoryLoop->id }}" {{ old('category_id') == $categoryLoop->id ? 'selected' : '' }}>{{ $categoryLoop->name }}</option>
                                                @foreach($categoryLoop->childCategories as $childCategory)
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
            <!-- update confirm modal -->
            @include('partials.pages.admin.update-confirm-modal')
    </form>
@endsection
@section('page-vendor-script')
@endsection
@section('page-level-js')
    <!-- Category edit form related script start -->
    <script>
        $(document).ready(function() {
            $('.modal').modal();
            $('input#name').characterCounter();
            M.updateTextFields();
        });
    </script>
    <!-- Category edit form related script end -->
@endsection
