<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Category;
use App\Models\SubCategory;

class homeController extends Controller
{
    public function index(Request $req)
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

        return view('clientModule.home.index', compact('categories', 'subCategories', 'products'));
    }
}
