<?php

namespace App\Http\Controllers\clientModule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class storeController extends Controller
{
    public function index(Request $req){
        return view('clientModule.category.category-full');
    }
}
