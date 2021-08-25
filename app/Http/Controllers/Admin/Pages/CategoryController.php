<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\DeleteCategoryRequest;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Category;
use App\Models\User;
use App\Services\CategoryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{

    public function index(): View
    {
        $categories = CategoryService::categories(20);
        return view('pages.admin.categories.index')
            ->with(['categories' => $categories]);
    }

    public function create(): View
    {
        $categories = CategoryService::categoriesWithFirstLayerChildCategories();
        return view('pages.admin.categories.create')
            ->with(['categories' => $categories]);
    }

    public function store(StoreCategoryRequest $storeCategoryRequest): RedirectResponse
    {
        $categoryName = $storeCategoryRequest->name;
        $parentCategoryId = $storeCategoryRequest->category_id;

        $category = CategoryService::storeCategory($categoryName, $parentCategoryId);
        return redirect()->route('admin.categories.show', $category->id)
            ->withMessage('Success! Data inserted.');
    }

    public function show(Category $category): View
    {
        return view('pages.admin.categories.show')
            ->with(['category' => $category->load(['childCategories.childCategories'])]);
    }

    public function edit(Category $category): View
    {
        $categories = CategoryService::categoriesWithFirstLayerChildCategories();
        return view('pages.admin.categories.edit')
            ->with(['category' => $category, 'categories' => $categories]);
    }

    public function update(UpdateCategoryRequest $updateCategoryRequest, Category $category): RedirectResponse
    {
        if (CategoryService::categoryIsClean($updateCategoryRequest->name, $category->id, $updateCategoryRequest->category_id)){
            return back()->withMessage('Error! Must one value have to change on update.');
        }
        CategoryService::updateCategory($updateCategoryRequest->name, $category->id, $updateCategoryRequest->category_id);
        return redirect()->route('admin.categories.show', $category->id)
            ->withMessage('Success! Data updated.');

    }

    public function destroy(DeleteCategoryRequest $deleteCategoryRequest): RedirectResponse
    {
        $selectedId = $deleteCategoryRequest->selected_id;
        Category::destroy($selectedId);
        return redirect()->back()
            ->withMessage('Success! Data deleted.');
    }
}
