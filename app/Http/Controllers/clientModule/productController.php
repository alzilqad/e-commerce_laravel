<?php

namespace App\Http\Controllers\clientModule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\ProductImage;

// use Stichoza\GoogleTranslate\GoogleTranslate;

class productController extends Controller
{

    public function index(Request $req, $product)
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();

        $activeProduct = Product::where('products.name_en', '=', $product)
            ->first();

        $activeProduct->images = ProductImage::where('product_image.product_id', '=', $activeProduct->id)
            ->get();

        // dd($product);

        // Google Translation
        // $tr = new GoogleTranslate('bn');
        // $activeProduct->name_en = $tr->translate($activeProduct->name_en);
        // $activeProduct->description = $tr->translate($activeProduct->description);

        $activeCategory = null;

        return view('clientModule.product.index', compact('categories', 'subCategories', 'activeProduct', 'activeCategory'));
    }
}
