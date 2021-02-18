<?php

namespace App\Http\Controllers\clientModule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use App\Models\Product;
use App\Models\ProductImage;

class cartController extends Controller
{
    public function index(Request $req)
    {
        return view('clientModule.cart.index');
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
    }

    public function viewCartProduct(Request $req)
    {
    }

    public function removeCartProduct(Request $req)
    {
    }
}
