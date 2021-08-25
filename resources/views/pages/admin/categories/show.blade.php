@extends('layouts.admin')
@section('description')
@endsection
@section('keywords')
@endsection
@section('title')
    {{ "Category Show | ".config('app.name') }}
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
                    <h5 class="breadcrumbs-title mt-0 mb-0"><span>Categories</span></h5>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Catalog</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                        <li class="breadcrumb-item active">Show</li>
                    </ol>
                </div>
                <div class="col s2 m6 l6">
                    <div class="right-align">
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn-floating btn-small waves-effect waves-light breadcrumbs-btn tooltipped @cannot('category-update') disabled @endcannot" data-position="left" data-tooltip="Edit"><i class="material-icons">edit</i></a>
                        <a href="{{ route('admin.categories.index') }}" class="btn-floating btn-small waves-effect waves-light btn-flat breadcrumbs-btn tooltipped @cannot('category-view-any') disabled @endcannot" data-position="left" data-tooltip="Back to index"><i class="material-icons">backspace</i></a>
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
                        <h6 class="mb-3"><i class="material-icons mr-1 vertical-align-bottom small">info_outline</i>Category Details</h6>
                        <div class="row">
                            <div class="col s12 mb-2">
                                <table class="striped">
                                    <tbody>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Slug</th>
                                        <th>Parent Category</th>
                                        <th>Child Categories</th>
                                    </tr>
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug ?? '' }}</td>
                                        <td>{{ $category->parentCategory->name ?? 'N/A'  }}</td>
                                        <td>
                                            @if($category->childCategories)
                                                @foreach($category->childCategories as $subCategory)
                                                    <br><span>&emsp; -- {{ $subCategory->name }}</span>
                                                    @if($subCategory->childCategories)
                                                        @foreach($subCategory->childCategories as $subCategory)
                                                            <br><span>&emsp; &emsp; ---- {{ $subCategory->name }}</span>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endif
                                        </td>
                                    </tbody>
                                </table>
                            </div>
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
@endsection
