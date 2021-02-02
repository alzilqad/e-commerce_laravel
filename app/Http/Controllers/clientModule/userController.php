<?php

namespace App\Http\Controllers\clientModule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function profile(Request $req){
        return view('clientModule.user.profile');
    }

    public function order(Request $req){
        return view('clientModule.user.order');
    }

    public function orders(Request $req){
        return view('clientModule.user.orders');
    }

    public function wishlist(Request $req){
        return view('clientModule.user.wishlist');
    }

}
