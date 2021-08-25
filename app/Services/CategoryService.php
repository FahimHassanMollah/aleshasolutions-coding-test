<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryService
{
    /**
     * Get Category Collection.
     * @param int|null $paginate
     * @return LengthAwarePaginator|Collection|null
     */
     public static function categories(int $paginate = null)
     {
         if (!$paginate){
             return Category::whereNull('category_id')->with('childCategories.childCategories')->orderBy('name', 'asc')->get();
         }
         return Category::whereNull('category_id')->with('childCategories.childCategories')->orderBy('name', 'asc')->paginate($paginate);

     }

    /**
     * Get Categories with Child.
     * @param int|null $paginate
     * @return Collection
     */
     public static function categoriesWithChild(int $paginate = null) : Collection
     {
         if (!$paginate){
             return Category::whereNull('category_id')->with('childCategories.childCategories')->orderBy('name', 'asc')->get();
         }
         return Category::whereNull('category_id')->with('childCategories')->orderBy('name', 'asc')->paginate($paginate);

     }

    /**
     * get Category with Parent Categories
     * @param int|null $paginate
     * @return LengthAwarePaginator|Collection|null
     */
     public static function categoriesWithParentCategories(int $paginate = null)
     {
         if ($paginate){
             return Category::with('parentCategory.parentCategory')
                     ->whereHas('parentCategory.parentCategory')
                     ->paginate($paginate);
         }
         return Category::with('parentCategory.parentCategory')
             ->whereHas('parentCategory.parentCategory')
             ->get();
     }

    /**
     * get all parent Categories with first child Categories.
     * @return Collection|null
     */
     public static function categoriesWithFirstLayerChildCategories(): ?Collection
     {
         return Category::whereNull('category_id')->with('childCategories')->get();
     }

    /**
     * Store Category.
     * @param string $name
     * @param int|null $parentCategoryId
     * @return Category
     */
     public static function storeCategory(string $name, int $parentCategoryId = null): Category
     {
         return Category::create(['name' => $name, 'category_id' => $parentCategoryId]);
     }

    /**
     * Check is Category clean.
     * @param string $categoryName
     * @param int $categoryId
     * @param int|null $parentCategoryId
     * @return bool
     */
     public static function categoryIsClean(string $categoryName, int $categoryId,  int $parentCategoryId = null): bool
     {
         $category = Category::find($categoryId)->fill(['name' => $categoryName, 'category_id' => $parentCategoryId]);
         $categoryIsClean = $category->isClean();
         if ($categoryIsClean) {
             return true;
         }
         return false;
     }

    /**
     * Update Category.
     * @param string $categoryName
     * @param int $categoryId
     * @param int|null $parentCategoryId
     * @return Category
     */
     public static function updateCategory(string $categoryName, int $categoryId,  int $parentCategoryId = null): Category
     {
         $category =  Category::find($categoryId)->fill(['name' => $categoryName, 'category_id' => $parentCategoryId]);
         $category->slug = null; // category slug will auto generate with Cviebrock Sluggable Package after save.
         $category->save();
         return $category;
     }

}
