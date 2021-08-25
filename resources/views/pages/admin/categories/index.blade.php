@extends('layouts.admin')
@section('description')
@endsection
@section('keywords')
@endsection
@section('title')
    {{ "Categories | ".config('app.name') }}
@endsection
@section('breadcrumbs')
    <form action="{{ route('admin.categories.destroy') }}" method="post">
        @csrf
        @method('DELETE')
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Categories</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Catalog</a></li>
                            <li class="breadcrumb-item active">Categories</li>
                        </ol>
                    </div>
                    <div class="col s2 m6 l6">
                        <div class="right-align">
                            <a href="{{ route('admin.categories.create') }}" class="btn-floating btn-small waves-effect waves-light breadcrumbs-btn tooltipped @cannot('category-create') disabled @endcannot" data-position="left" data-tooltip="Create"><i class="material-icons">add</i></a>
                            <a href="#deleteModal" class="modal-trigger btn-floating btn-small waves-effect waves-light btn-flat breadcrumbs-btn tooltipped @cannot('category-delete') disabled @endcannot" data-position="left" data-tooltip="Delete"><i class="material-icons">delete</i></a>
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
                                <table class="responsive-table">
                                    <thead>
                                    <tr>
                                        <th>
                                            <input id="allCheckboxInputForUser" class="custom-checkbox" type="checkbox" onclick="$('input[name*=\'selected_id\']').prop('checked', this.checked);"/>
                                        </th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Parent Category</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        @include('partials.pages.admin.categories.index-table-row', ['category' => $category])
                                        @foreach($category->childCategories as $childCategory)
                                            @include('partials.pages.admin.categories.index-table-row', ['category' => $childCategory, 'prefix' => '--'])
                                            @foreach($childCategory->childCategories as $childCategory)
                                                @include('partials.pages.admin.categories.index-table-row', ['category' => $childCategory, 'prefix' => '----'])
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <div class="col s12">
                                    <span class="right-align">
                                        {{ $categories->links('vendor.pagination.materialize') }}
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
    <!-- category listing related script start -->
    <script>
        $(document).ready(function(){
            $('.modal').modal();
            $('.dropdown-trigger').dropdown({
                alignment: 'right',
                constrainWidth: false
            });
        });
    </script>
    <!-- category listing related script end -->
@endsection
