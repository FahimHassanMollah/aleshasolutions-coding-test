<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryController extends Controller
{
    /**
     * Get all Categories with Child.
     * @return ResourceCollection
     */
    public function index()
    {
        $categories = CategoryService::categoriesWithChild();
        return CategoryResource::collection($categories);
    }

    /**
     * Get all Product by Category.
     * @param Category $category
     * @return ResourceCollection
     */
    public function productsByCategory(Category $category): ResourceCollection
    {
        $products = ProductService::productsByCategory($category->id);
        return ProductResource::collection($products);
    }
}
