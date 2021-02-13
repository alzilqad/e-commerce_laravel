<?php

namespace App\Http\Controllers\clientModule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\ProductImage;

class homeController extends Controller
{
    public function index(Request $req)
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $products = Product::where('products.stock_status', 1)
            ->where('products.active_status', 1)
            ->where('products.verify_status', 1)
            ->orderBy('products.create_at', 'desc')
            ->get();

        foreach ($products as $product) {
            $product->image = ProductImage::select('product_image.image_link')->where('product_image.product_id', '=', $product->id)->first();
        }

        $data = [
            'categories' => $categories,
            'subCategories' => $subCategories,
            'products' => $products,
            'activeCategory' => null,
            'activeSubCategory' => null,
        ];

        return view('clientModule.home.index', compact('data'));
    }

    public function singularCategoryPage(Request $req, $category)
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $products = Product::where('products.stock_status', 1)
            ->where('products.active_status', 1)
            ->where('products.verify_status', 1)
            ->orderBy('products.create_at', 'desc')
            ->get();

        foreach ($products as $product) {
            $product->image = ProductImage::select('product_image.image_link')->where('product_image.product_id', '=', $product->id)->first();
        }

        $activeCategory = Category::where('name_en', $category)
            ->first();

        $data = [
            'categories' => $categories,
            'subCategories' => $subCategories,
            'products' => $products,
            'activeCategory' => $activeCategory,
            'activeSubCategory' => null,
        ];

        if ($activeCategory != null) {
            return view('clientModule.category.category', compact('data'));
        } else {
            return back();
        }
    }

    public function multipleCategoryPage(Request $req)
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $products = Product::where('products.stock_status', 1)
            ->where('products.active_status', 1)
            ->where('products.verify_status', 1)
            ->orderBy('products.create_at', 'desc')
            ->get();

        foreach ($products as $product) {
            $product->image = ProductImage::select('product_image.image_link')->where('product_image.product_id', '=', $product->id)->first();
        }

        $data = [
            'categories' => $categories,
            'subCategories' => $subCategories,
            'products' => $products,
            'activeCategory' => null,
            'activeSubCategory' => null,
        ];

        return view('clientModule.category.category-multiple', compact('data'));
    }

    public function newArrivalPage(Request $req)
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $products = Product::where('products.stock_status', 1)
            ->where('products.active_status', 1)
            ->where('products.verify_status', 1)
            ->orderBy('products.create_at', 'desc')
            ->get();

        foreach ($products as $product) {
            $product->image = ProductImage::select('product_image.image_link')->where('product_image.product_id', '=', $product->id)->first();
        }

        $data = [
            'categories' => $categories,
            'subCategories' => $subCategories,
            'products' => $products,
            'activeCategory' => null,
            'activeSubCategory' => null,
            'page' => "New Arrival"
        ];

        return view('clientModule.new-arrival.index', compact('data'));
    }

    public function offerPage(Request $req)
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $products = Product::where('products.stock_status', 1)
            ->where('products.active_status', 1)
            ->where('products.verify_status', 1)
            ->orderBy('products.create_at', 'desc')
            ->get();

        foreach ($products as $product) {
            $product->image = ProductImage::select('product_image.image_link')->where('product_image.product_id', '=', $product->id)->first();
        }

        $data = [
            'categories' => $categories,
            'subCategories' => $subCategories,
            'products' => $products,
            'activeCategory' => null,
            'activeSubCategory' => null,
            'page' => "Best Offer"
        ];

        return view('clientModule.best-offer.index', compact('data'));
    }

    public function subCategoryPage(Request $req, $category, $subCategory)
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $products = Product::where('products.stock_status', 1)
            ->where('products.active_status', 1)
            ->where('products.verify_status', 1)
            ->orderBy('products.create_at', 'desc')
            ->get();

        foreach ($products as $product) {
            $product->image = ProductImage::select('product_image.image_link')->where('product_image.product_id', '=', $product->id)->first();
        }

        $activeCategory = Category::where('name_en', $category)
            ->first();

        $activeSubCategory = SubCategory::where('category_id', $activeCategory->id)
            ->where('name_en', $subCategory)
            ->first();


        $data = [
            'categories' => $categories,
            'subCategories' => $subCategories,
            'products' => $products,
            'activeCategory' => $activeCategory,
            'activeSubCategory' => $activeSubCategory,
            'parentSubCategory' => null,
            'parentSubCategory2' => null
        ];

        if ($activeSubCategory != null) {
            return view('clientModule.sub-category.index', compact('data'));
        } else {
            return back();
        }
    }

    public function subCategoryPage2(Request $req, $category, $subCategory, $subCategory2)
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $products = Product::where('products.stock_status', 1)
            ->where('products.active_status', 1)
            ->where('products.verify_status', 1)
            ->orderBy('products.create_at', 'desc')
            ->get();

        foreach ($products as $product) {
            $product->image = ProductImage::select('product_image.image_link')->where('product_image.product_id', '=', $product->id)->first();
        }

        $activeCategory = Category::where('name_en', $category)
            ->first();

        $parentSubCategory = SubCategory::where('category_id', $activeCategory->id)
            ->where('name_en', $subCategory)
            ->first();

        $activeSubCategory = SubCategory::where('category_id', $activeCategory->id)
            ->where('name_en', $subCategory2)
            ->first();

        $data = [
            'categories' => $categories,
            'subCategories' => $subCategories,
            'products' => $products,
            'activeCategory' => $activeCategory,
            'activeSubCategory' => $activeSubCategory,
            'parentSubCategory' => $parentSubCategory,
            'parentSubCategory2' => null
        ];

        if ($activeSubCategory != null) {
            return view('clientModule.sub-category.index', compact('data'));
        } else {
            return back();
        }
    }

    public function subCategoryPage3(Request $req, $category, $subCategory, $subCategory2, $subCategory3)
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $products = Product::where('products.stock_status', 1)
            ->where('products.active_status', 1)
            ->where('products.verify_status', 1)
            ->orderBy('products.create_at', 'desc')
            ->get();

        foreach ($products as $product) {
            $product->image = ProductImage::select('product_image.image_link')->where('product_image.product_id', '=', $product->id)->first();
        }

        $activeCategory = Category::where('name_en', $category)
            ->first();

        $activeSubCategory = SubCategory::where('category_id', $activeCategory->id)
            ->where('name_en', $subCategory3)
            ->first();

        $parentSubCategory2 = SubCategory::where('category_id', $activeCategory->id)
            ->where('id', $activeSubCategory->sub_category_id)
            ->first();

        $parentSubCategory = SubCategory::where('category_id', $activeCategory->id)
            ->where('id', $parentSubCategory2->sub_category_id)
            ->first();

        $data = [
            'categories' => $categories,
            'subCategories' => $subCategories,
            'products' => $products,
            'activeCategory' => $activeCategory,
            'activeSubCategory' => $activeSubCategory,
            'parentSubCategory' => $parentSubCategory,
            'parentSubCategory2' => $parentSubCategory2,
        ];

        if ($activeSubCategory != null) {
            return view('clientModule.sub-category.index', compact('data'));
        } else {
            return back();
        }
    }

    public function searchProductView(Request $req)
    {
        $text = $req->input('inputText');

        $categories = Category::all();
        $subCategories = SubCategory::all();
        $products = Product::where('products.stock_status', 1)
            ->where('products.active_status', 1)
            ->where('products.verify_status', 1)
            ->where('products.name_en', 'like', '%' . $text . '%')
            ->orderBy('products.create_at', 'desc')
            ->get();

        foreach ($products as $product) {
            $product->image = ProductImage::select('product_image.image_link')->where('product_image.product_id', '=', $product->id)->first();
        }

        $data = [
            'categories' => $categories,
            'subCategories' => $subCategories,
            'products' => $products,
            'text' => $text,
            'activeCategory' => null
        ];

        return view('clientModule.search.index', compact('data'));
    }
}
