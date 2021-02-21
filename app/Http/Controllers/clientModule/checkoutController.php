<?php

namespace App\Http\Controllers\clientModule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use stdClass;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\ProductImage;

class checkoutController extends Controller
{
    public function index(Request $req)
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();

        $data = [
            'categories' => $categories,
            'subCategories' => $subCategories,
            'activeCategory' => null,
            'activeProduct' => null,
            'activeSubCategory' => null,
            'parentSubCategory' => null,
            'parentSubCategory2' => null,
        ];

        return view('clientModule.pages.checkout.checkout2', compact('data'));
    }
}
