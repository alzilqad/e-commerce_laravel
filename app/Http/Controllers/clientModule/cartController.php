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

class cartController extends Controller
{
    public function index(Request $req)
    {
        // $req->session()->forget('cart');

        $categories = Category::all();
        $subCategories = SubCategory::all();

        $products = [];
        if (session()->has('cart')) {
            foreach (session()->get('cart') as $cartProduct) {
                $product = Product::where('id', $cartProduct['id'])->get()->first();
                $product->quantity = $cartProduct['quantity'];
                $product->image = $cartProduct['image'];
                array_push($products, $product);
            }
        }

        $data = [
            'categories' => $categories,
            'subCategories' => $subCategories,
            'products' => $products,
            'totalPrice' => session()->get('totalCartCost'),
            'activeCategory' => null,
            'activeProduct' => null,
            'activeSubCategory' => null,
            'parentSubCategory' => null,
            'parentSubCategory2' => null,
        ];

        // dd($products);

        return view('clientModule.pages.cart.index', compact('data'));
    }

    public function addCartProduct(Request $req)
    {
        $isExistInCart = false;

        //if the item exist in the cart
        if ($req->session()->has('cart')) {                                 //if exist
            $cartProducts = $req->session()->pull('cart');                  //destroy the session and retrive it
            foreach ($cartProducts as $cartProduct) {                       //loop over all existing cart products
                // print($cartProduct);
                if ($cartProduct['id'] == $req->id) {                       //if the item exists in the cart
                    $cartProduct['quantity'] += 1;                          //increase the quantity
                    $req->session()->push('cart', $cartProduct);            //add updated product into the cart
                    $isExistInCart = true;
                } else {
                    $req->session()->push('cart', $cartProduct);            //else add previous product into the cart
                }
            }
        }

        //if the item doesn't exist in the cart
        if (!$isExistInCart) {
            $newCartProduct = Product::where('products.id', '=', $req->id)
                ->get()
                ->first();

            $newCartProduct->image = ProductImage::where('product_image.product_id', '=', $newCartProduct->id)
                ->get()
                ->first();

            $item = [
                'id' => $newCartProduct->id,
                'name' => $newCartProduct->name_en,
                'price' => $newCartProduct->buying_price,
                'image' => "img/error.jpg",
                'quantity' => 1,
            ];

            if ($newCartProduct->image != null) {
                $item['image'] = $newCartProduct->image->image_link;
            }

            $req->session()->push('cart', $item);
        }

        //calculate total cart price
        if ($req->session()->has('cart')) {
            $totalCartCost = 0;
            foreach ($req->session()->get('cart') as $product) {
                $totalCartCost = $totalCartCost + ($product['price'] * $product['quantity']);
            }
            $req->session()->put('totalCartCost', $totalCartCost);
        }
        //end calculate total cart price

        // $req->session()->forget('cart');
        return URL::previous();
    }

    public function modifyCartProduct(Request $req)
    {
        if (session()->has('cart')) {
            $cartProducts = $req->session()->pull('cart');                  //destroy the session and retrive it
            foreach ($cartProducts as $cartProduct) {
                if ($cartProduct['id'] == $req->cartId) {
                    $cartProduct['quantity'] = $req->quantity;                          //increase the quantity
                    if ($req->quantity > 0) {
                        $req->session()->push('cart', $cartProduct);            //add updated product into the cart
                    }
                } else {
                    $req->session()->push('cart', $cartProduct);            //else add previous product into the cart
                }
            }
        }

        //calculate total cart price
        if ($req->session()->has('cart')) {
            $totalCartCost = 0;
            foreach ($req->session()->get('cart') as $product) {
                $totalCartCost = $totalCartCost + ($product['price'] * $product['quantity']);
            }
            $req->session()->put('totalCartCost', $totalCartCost);
        }

        return URL::previous();
    }

    public function removeCartProduct(Request $req)
    {
        if (session()->has('cart')) {
            $cartProducts = $req->session()->pull('cart');                  //destroy the session and retrive it
            foreach ($cartProducts as $cartProduct) {
                if ($cartProduct['id'] != $req->cartId) {
                    $req->session()->push('cart', $cartProduct);
                }
            }
        }

        //calculate total cart price
        if ($req->session()->has('cart')) {
            $totalCartCost = 0;
            foreach ($req->session()->get('cart') as $product) {
                $totalCartCost = $totalCartCost + ($product['price'] * $product['quantity']);
            }
            $req->session()->put('totalCartCost', $totalCartCost);
        }

        return URL::previous();
    }
}
