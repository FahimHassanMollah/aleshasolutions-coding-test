<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\DeleteProductRequest;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Throwable;
use Illuminate\View\View;

class ProductController extends Controller
{

    public function index(Request $request): View
    {
        $searchName = $request->name;
        $products = ProductService::products(20, $searchName, true);
        return view('pages.admin.products.index')
            ->with(['products' => $products]);
    }

    public function create(): View
    {
        $categories = CategoryService::categoriesWithParentCategories();
        return view('pages.admin.products.create')
            ->with(['categories' => $categories]);
    }


    public function store(StoreProductRequest $storeProductRequest): RedirectResponse
    {
        $productName            = $storeProductRequest->name;
        $productDescription     = $storeProductRequest->description;
        $productPrice           = $storeProductRequest->price;
        $productImage           = $storeProductRequest->image;
        $productStatus          = $storeProductRequest->status;
        $productCategoriesId    = $storeProductRequest->category_id;
        $productUploadedImagePath = [];

        if ($productImage){
            foreach ($productImage as $image){
                try {
                    $imagePath = ProductService::storeProductImage($image, 'public', 'product', '');
                    array_push($productUploadedImagePath, $imagePath);
                } catch (Throwable $exception){
                    return redirect()->back()->withMessage("Error! Message: ".$exception->getMessage());
                }
            }
        }

        $product = ProductService::storeProduct($productName, $productDescription, $productPrice, json_encode($productUploadedImagePath), $productStatus);

        if ($productCategoriesId){
            ProductService::attachCategoriesToProduct($product->id, $productCategoriesId);
        }
        return redirect()->route('admin.products.show', $product->id)
            ->withMessage('Success! Data inserted.');
    }


    public function show(Product $product): View
    {
        return view('pages.admin.products.show')
            ->with(['product' => $product->load('categories')]);
    }


    public function edit(Product $product): View
    {
        $categories = CategoryService::categoriesWithParentCategories();
        return view('pages.admin.products.edit')
            ->with(['product' => $product->load('categories'), 'categories' => $categories]);
    }

    public function update(UpdateProductRequest $updateProductRequest, Product $product): RedirectResponse
    {
        $productName            = $updateProductRequest->name;
        $productDescription     = $updateProductRequest->description;
        $productPrice           = $updateProductRequest->price;
        $productImage           = $updateProductRequest->image;
        $productStatus          = $updateProductRequest->status;
        $productCategoriesId    = $updateProductRequest->category_id;
        $productUploadedImagePath = [];

        if ($productImage){
            foreach ($productImage as $image){
                try {
                    $imagePath = ProductService::storeProductImage($image, 'public', 'product');
                    array_push($productUploadedImagePath, $imagePath);
                } catch (Throwable $exception){
                    return redirect()->back()->withMessage("Error! Message: ".$exception->getMessage());
                }
            }
            $productUploadedImagePathJsonEncoded = json_encode($productUploadedImagePath);
            foreach (json_decode($product->image) as $image){
                ProductService::deleteProductImage($image);
            }
        } else {
            $productUploadedImagePathJsonEncoded = $product->image;
        }

        $productIsClean = ProductService::productIsClean($product->id, $productName, $productDescription, $productPrice, $productUploadedImagePathJsonEncoded, $productStatus);
        if ($productIsClean){
            return back()->withMessage('Error! Must one value have to change on update.');
        }
        ProductService::updateProduct($product->id, $productName, $productDescription, $productPrice, $productUploadedImagePathJsonEncoded, $productStatus);

        if ($productCategoriesId){
            ProductService::attachCategoriesToProduct($product->id, $productCategoriesId);
        }
        return redirect()->route('admin.products.show', $product->id)
            ->withMessage('Success! Data updated.');
    }

    public function destroy(DeleteProductRequest $deleteProductRequest): RedirectResponse
    {
        $selectedId = $deleteProductRequest->selected_id;

        foreach ($selectedId as $productId){
            ProductService::deleteProduct($productId);
        }
        return redirect()->back()
            ->withMessage('Success! Data deleted.');
    }
}
