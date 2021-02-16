<?php

namespace App\Http\Controllers\clientModule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\ProductImage;

// use Stichoza\GoogleTranslate\GoogleTranslate;

class productController extends Controller
{

    public function index(Request $req, $id, $product)
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();

        $activeProduct = Product::where('products.id', '=', $id)
            ->where('products.name_en', '=', $product)
            ->first();

        $activeProduct->images = ProductImage::where('product_image.product_id', '=', $activeProduct->id)
            ->get();

        // dd($product);

        // Google Translation
        // $tr = new GoogleTranslate('bn');
        // $activeProduct->name_en = $tr->translate($activeProduct->name_en);
        // $activeProduct->description = $tr->translate($activeProduct->description);

        $data = [
            'categories' => $categories,
            'subCategories' => $subCategories,
            'activeCategory' => null,
            'activeProduct' => $activeProduct,
            'activeSubCategory' => null,
            'parentSubCategory' => null,
            'parentSubCategory2' => null,
        ];

        return view('clientModule.product.index', compact('data'));
    }

    public function searchProductView(Request $req)
    {
        if (!$req->session()->has('sort')) {
            $req->session()->flash('sort', 'create_at');
            $req->session()->flash('order', 'desc');
        }

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
            'activeCategory' => null,
            'activeSubCategory' => null,
            'parentSubCategory' => null,
            'parentSubCategory2' => null,
        ];

        return view('clientModule.search.index', compact('data'));
    }

    public function sortProductView(Request $req)
    {
        $sortOption = $req->sort;
        $order = '';

        $req->session()->flash('sort', $sortOption);

        if ($sortOption == "create_at" || $sortOption == "discount") {
            $req->session()->flash('order', 'desc');
            $order = 'desc';
        } elseif ($sortOption == "name_en" || $sortOption == "buying_price") {
            $req->session()->flash('order', 'asc');
            $order = 'asc';
        }

        $data = [
            'url' => URL::previous(),
            'order' => $order,
        ];

        return $data;
    }

    public function orderProductView(Request $req)
    {
        $order = $req->order;
        $sortOption = $req->sort;

        if ($order == "asc") {
            $req->session()->flash('order', 'asc');
            $req->session()->flash('sort', $sortOption);
        } else if ($order == "desc") {
            $req->session()->flash('order', 'desc');
            $req->session()->flash('sort', $sortOption);
        }

        $data = [
            'url' => URL::previous(),
            'order' => $order,
        ];

        return $data;
    }
}
