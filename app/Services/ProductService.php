<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Exception;

class ProductService
{
    /**
     * @param int|null $paginate
     * @param string|null $searchName
     * @param bool $withCategories
     * @return LengthAwarePaginator|Collection|null
     */
    public static function products(int $paginate = null, string $searchName = null, bool $withCategories = false)
    {
        $products = Product::query();
        if ($searchName){
            $products->where('name', 'LIKE', "%$searchName%");
        }
        if ($withCategories){
            $products->with('categories');
        }
        if ($paginate){
            return $products->paginate($paginate);
        }
        return $products->get();
    }

    /**
     * Save Product Image.
     * @param UploadedFile $uploadedFile
     * @param string $disk
     * @param string|null $folder
     * @param null $fileName
     * @return string
     */
    public static function storeProductImage(UploadedFile $uploadedFile, string $disk = 'public', string $folder = null, $fileName = null): string
    {
        if (!$fileName){
            $filePath = $uploadedFile->store($folder, $disk);
        } else {
            $filePath = $uploadedFile->storeAs($folder, time().".".$uploadedFile->getClientOriginalExtension(), $disk);
        }

        if (!$filePath){
            throw new Exception('File not uploaded.');
        }
        return $filePath;
    }

    /**
     * Delete Product Image.
     * @param string $avatarPath
     */
    public static function deleteProductImage(string $avatarPath): void
    {
        if (Storage::disk('public')->exists($avatarPath)){
            Storage::disk('public')->delete($avatarPath);
        }
    }

    /**
     * @param string|null $productName
     * @param string|null $productDescription
     * @param float $productPrice
     * @param string|null $productImagePath
     * @param bool $productStatus
     * @return Product
     */
    public static function storeProduct(string $productName = null, string $productDescription = null, float $productPrice = 0.0, string $productImagePath = null, bool $productStatus = true): Product
    {
        $product = Product::create(['name' => $productName, 'description' => $productDescription, 'price' => $productPrice, 'image' => $productImagePath, 'status' => $productStatus]);
        $product->save();
        return $product;
    }

    /**
     * Attach Categories to Product
     * @param int $productId
     * @param array $categoriesId
     * @param bool $detachExisting
     * @return array|null
     */
    public static function attachCategoriesToProduct(int $productId, array $categoriesId = [], bool $detachExisting = true): ?array
    {
        $product = Product::find($productId);
        return $detachExisting ? $product->categories()->sync($categoriesId) : $product->userPermissions()->attach($categoriesId);
    }

    /**
     * Check is product clean to update.
     * @param int $productId
     * @param string|null $productName
     * @param string|null $productDescription
     * @param float $productPrice
     * @param string|null $productImagePath
     * @param bool $productStatus
     * @return bool
     */
    public static function productIsClean(int $productId, string $productName = null, string $productDescription = null, float $productPrice = 0.0, string $productImagePath = null, bool $productStatus = true): bool
    {
        $product = Product::find($productId)->fill(['name' => $productName, 'description' => $productDescription, 'price' => $productPrice, 'image' => $productImagePath, 'status' => $productStatus]);
        $productIsClean = $product->isClean('price');
        if ($productIsClean){
            return true;
        }
        return false;
    }

    /**
     * Update Product.
     * @param int $productId
     * @param string|null $productName
     * @param string|null $productDescription
     * @param float $productPrice
     * @param string|null $productImagePath
     * @param bool $productStatus
     * @return Product
     */
    public static function updateProduct(int $productId, string $productName = null, string $productDescription = null, float $productPrice = 0.0, string $productImagePath = null, bool $productStatus = true): Product
    {
        $product = Product::find($productId)->fill(['name' => $productName, 'description' => $productDescription, 'price' => $productPrice, 'image' => $productImagePath, 'status' => $productStatus]);
        $product->save();
        return $product;
    }

    /**
     * Delete Product's Image.
     * @param int $productId
     */
    public static function deleteProduct(int $productId): void
    {
        $product = Product::find($productId);
        if (json_decode($product->image)){
            foreach (json_decode($product->image) as $image){
                self::deleteProductImage($image);
            }
        }
        $product->delete();
    }

}
