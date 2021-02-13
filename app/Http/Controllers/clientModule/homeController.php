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

        $activeCategory = null;
        $activeSubCategory = null;

        return view('clientModule.home.index', compact('categories', 'subCategories', 'products', 'activeCategory', 'activeSubCategory'));
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
        $activeSubCategory = null;

        if ($activeCategory != null) {
            return view('clientModule.category.category', compact('categories', 'subCategories', 'products', 'activeCategory', 'activeSubCategory'));
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

        $activeCategory = null;
        $activeSubCategory = null;
        return view('clientModule.category.category-multiple', compact('categories', 'subCategories', 'products', 'activeCategory', 'activeSubCategory'));
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

        $page = "New Arrival";
        $activeCategory = null;
        $activeSubCategory = null;
        return view('clientModule.new-arrival.index', compact('categories', 'subCategories', 'products', 'page', 'activeCategory', 'activeSubCategory'));
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

        $page = "Best Offer";
        $activeCategory = null;
        $activeSubCategory = null;
        return view('clientModule.best-offer.index', compact('categories', 'subCategories', 'products', 'page', 'activeCategory', 'activeSubCategory'));
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

        $parentSubCategory = null;

        if ($activeSubCategory != null) {
            return view('clientModule.sub-category.index', compact('categories', 'subCategories', 'products', 'activeCategory', 'activeSubCategory', 'parentSubCategory'));
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

        if ($activeSubCategory != null) {
            return view('clientModule.sub-category.index', compact('categories', 'subCategories', 'products', 'activeCategory', 'activeSubCategory', 'parentSubCategory'));
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


        $parentSubCategory = null;

        if ($activeSubCategory != null) {
            return view('clientModule.sub-category.index', compact('categories', 'subCategories', 'products', 'activeCategory', 'activeSubCategory', 'parentSubCategory'));
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

        $activeCategory = null;
        $activeSubCategory = null;

        return view('clientModule.search.index', compact('categories', 'subCategories', 'products', 'activeCategory', 'activeSubCategory', 'text'));
    }
}
