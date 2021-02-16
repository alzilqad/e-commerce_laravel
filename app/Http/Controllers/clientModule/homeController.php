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
        if (!$req->session()->has('sort')) {
            $req->session()->flash('sort', 'create_at');
            $req->session()->flash('order', 'desc');
        }

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
            'parentSubCategory' => null,
            'parentSubCategory2' => null,
        ];

        return view('clientModule.home.index', compact('data'));
    }
        
    public function newArrivalPage(Request $req)
    {
        if (!$req->session()->has('sort')) {
            $req->session()->flash('sort', 'create_at');
            $req->session()->flash('order', 'desc');
        }

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
            'parentSubCategory' => null,
            'parentSubCategory2' => null,
            'page' => "New Arrival"
        ];

        return view('clientModule.new-arrival.index', compact('data'));
    }

    public function offerPage(Request $req)
    {
        if (!$req->session()->has('sort')) {
            $req->session()->flash('sort', 'discount');
            $req->session()->flash('order', 'desc');
        }

        $categories = Category::all();
        $subCategories = SubCategory::all();
        $products = Product::where('products.stock_status', 1)
            ->where('products.active_status', 1)
            ->where('products.verify_status', 1)
            ->orderBy('products.create_at', 'desc')
            ->where('products.discount', '>', 0)
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
            'parentSubCategory' => null,
            'parentSubCategory2' => null,
            'page' => "Best Offer"
        ];

        return view('clientModule.best-offer.index', compact('data'));
    }

    public function multipleCategoryPage(Request $req)
    {
        if (!$req->session()->has('sort')) {
            $req->session()->flash('sort', 'create_at');
            $req->session()->flash('order', 'desc');
        }

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
            'parentSubCategory' => null,
            'parentSubCategory2' => null,
        ];

        return view('clientModule.category.category-multiple', compact('data'));
    }

    public function singularCategoryPage(Request $req, $category)
    {
        if (!$req->session()->has('sort')) {
            $req->session()->flash('sort', 'create_at');
            $req->session()->flash('order', 'desc');
        }

        $categories = Category::all();
        $subCategories = SubCategory::all();

        $activeCategory = Category::where('name_en', $category)
            ->first();

        $products = Product::where('products.stock_status', 1)
            ->where('products.active_status', 1)
            ->where('products.verify_status', 1)
            ->where('products.category_product_id', $activeCategory->id)
            ->orderBy('products.create_at', 'desc')
            ->get();

        foreach ($products as $product) {
            $product->image = ProductImage::select('product_image.image_link')->where('product_image.product_id', '=', $product->id)->first();
        }

        $data = [
            'categories' => $categories,
            'subCategories' => $subCategories,
            'products' => $products,
            'activeCategory' => $activeCategory,
            'activeSubCategory' => null,
            'parentSubCategory' => null,
            'parentSubCategory2' => null,
        ];

        if ($activeCategory != null) {
            return view('clientModule.category.category', compact('data'));
        } else {
            return back();
        }
    }

    public function subCategoryPageLevel1(Request $req, $category, $subCategory)
    {
        if (!$req->session()->has('sort')) {
            $req->session()->flash('sort', 'create_at');
            $req->session()->flash('order', 'desc');
        }

        $categories = Category::all();
        $subCategories = SubCategory::all();

        $activeCategory = Category::where('name_en', $category)
            ->first();

        $activeSubCategory = SubCategory::where('category_id', $activeCategory->id)
            ->where('name_en', $subCategory)
            ->first();

        $products = Product::where('products.stock_status', 1)
            ->where('products.active_status', 1)
            ->where('products.verify_status', 1)
            ->where('products.category_product_id', $activeCategory->id)
            ->where('products.category_sub_product_id', $activeSubCategory->id)
            ->orderBy('products.create_at', 'desc')
            ->get();

        foreach ($products as $product) {
            $product->image = ProductImage::select('product_image.image_link')->where('product_image.product_id', '=', $product->id)->first();
        }

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

    public function subCategoryPageLevel2(Request $req, $category, $subCategory, $subCategory2)
    {
        if (!$req->session()->has('sort')) {
            $req->session()->flash('sort', 'create_at');
            $req->session()->flash('order', 'desc');
        }

        $categories = Category::all();
        $subCategories = SubCategory::all();

        $activeCategory = Category::where('name_en', $category)
            ->first();

        $parentSubCategory = SubCategory::where('category_id', $activeCategory->id)
            ->where('name_en', $subCategory)
            ->first();

        $activeSubCategory = SubCategory::where('category_id', $activeCategory->id)
            ->where('name_en', $subCategory2)
            ->first();

        $products = Product::where('products.stock_status', 1)
            ->where('products.active_status', 1)
            ->where('products.verify_status', 1)
            ->where('products.category_product_id', $activeCategory->id)
            ->where('products.category_sub_product_id', $activeSubCategory->id)
            ->orderBy('products.create_at', 'desc')
            ->get();

        foreach ($products as $product) {
            $product->image = ProductImage::select('product_image.image_link')->where('product_image.product_id', '=', $product->id)->first();
        }

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

    public function subCategoryPageLevel3(Request $req, $category, $subCategory, $subCategory2, $subCategory3)
    {
        if (!$req->session()->has('sort')) {
            $req->session()->flash('sort', 'create_at');
            $req->session()->flash('order', 'desc');
        }

        $categories = Category::all();
        $subCategories = SubCategory::all();
        
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
        
        $products = Product::where('products.stock_status', 1)
            ->where('products.active_status', 1)
            ->where('products.verify_status', 1)
            ->where('products.category_product_id', $activeCategory->id)
            ->where('products.category_sub_product_id', $activeSubCategory->id)
            ->orderBy('products.create_at', 'desc')
            ->get();

        foreach ($products as $product) {
            $product->image = ProductImage::select('product_image.image_link')->where('product_image.product_id', '=', $product->id)->first();
        }

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
}
