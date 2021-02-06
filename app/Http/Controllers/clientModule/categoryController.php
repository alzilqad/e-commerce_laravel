<?php

namespace App\Http\Controllers\clientModule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Category;
use App\Models\SubCategory;

class categoryController extends Controller
{
    public function singularCategoryPage(Request $req, $category)
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $products = DB::table('products')
            ->leftJoin('product_image', 'product_image.product_id', '=', 'products.id')
            ->where('products.stock_status', 1)
            ->where('products.active_status', 1)
            ->where('products.verify_status', 1)
            ->orderBy('products.create_at', 'desc')
            ->get();

        $activeCategory = Category::where('name_en', $category)
            ->first();

        // dd($products);

        if ($activeCategory != null) {
            return view('clientModule.category.category', compact('categories', 'subCategories', 'products', 'activeCategory'));
        } else {
            return back();
        }
    }

    public function multipleCategoryPage(Request $req)
    {
        
    }

    public function newArrivalPage(Request $req)
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $products = DB::table('products')
            ->leftJoin('product_image', 'product_image.product_id', '=', 'products.id')
            ->where('products.stock_status', 1)
            ->where('products.active_status', 1)
            ->where('products.verify_status', 1)
            ->orderBy('products.create_at', 'desc')
            ->get();

        $page = "New Arrival";
        return view('clientModule.category.newpage', compact('categories', 'subCategories', 'products', 'page'));
    }

    public function offerPage(Request $req)
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $products = DB::table('products')
            ->leftJoin('product_image', 'product_image.product_id', '=', 'products.id')
            ->where('products.stock_status', 1)
            ->where('products.active_status', 1)
            ->where('products.verify_status', 1)
            ->orderBy('products.create_at', 'desc')
            ->get();

        $page = "Best Offer";
        return view('clientModule.category.offerpage', compact('categories', 'subCategories', 'products', 'page'));
    }

}
