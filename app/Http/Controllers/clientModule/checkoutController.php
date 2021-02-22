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
    public function delivery(Request $req)
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();

        // Read File

        $jsonString = file_get_contents(base_path('resources/js/address.json'));
        $address = json_decode($jsonString, true);
        // dd($address);

        $data = [
            'categories' => $categories,
            'subCategories' => $subCategories,
            'activeCategory' => null,
            'activeProduct' => null,
            'activeSubCategory' => null,
            'parentSubCategory' => null,
            'parentSubCategory2' => null,
            'address' => $address
        ];

        return view('clientModule.pages.checkout.checkout-delivery', compact('data'));
    }

    public function address(Request $req)
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();

        // Read File

        $jsonString = file_get_contents(base_path('resources/js/address.json'));
        $address = json_decode($jsonString, true);
        // dd($address);

        $data = [
            'categories' => $categories,
            'subCategories' => $subCategories,
            'activeCategory' => null,
            'activeProduct' => null,
            'activeSubCategory' => null,
            'parentSubCategory' => null,
            'parentSubCategory2' => null,
            'address' => $address
        ];

        return view('clientModule.pages.checkout.checkout-address', compact('data'));
    }

    public function payment(Request $req)
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();

        // Read File

        $jsonString = file_get_contents(base_path('resources/js/address.json'));
        $address = json_decode($jsonString, true);
        // dd($address);

        $data = [
            'categories' => $categories,
            'subCategories' => $subCategories,
            'activeCategory' => null,
            'activeProduct' => null,
            'activeSubCategory' => null,
            'parentSubCategory' => null,
            'parentSubCategory2' => null,
            'address' => $address
        ];

        return view('clientModule.pages.checkout.checkout-payment', compact('data'));
    }

    public function review(Request $req)
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();

        // Read File

        $jsonString = file_get_contents(base_path('resources/js/address.json'));
        $address = json_decode($jsonString, true);
        // dd($address);

        $data = [
            'categories' => $categories,
            'subCategories' => $subCategories,
            'activeCategory' => null,
            'activeProduct' => null,
            'activeSubCategory' => null,
            'parentSubCategory' => null,
            'parentSubCategory2' => null,
            'address' => $address
        ];

        return view('clientModule.pages.checkout.checkout-review', compact('data'));
    }

    public function getDistrictArray(Request $req)
    {
        $jsonString = file_get_contents(base_path('resources/js/address.json'));
        $address = json_decode($jsonString, true);

        return $address[$req->division];
    }
}
