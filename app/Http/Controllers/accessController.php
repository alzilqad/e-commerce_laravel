<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\SubCategory;

class accessController extends Controller
{
    public function login()
    {
        
    }

    public function showRegisterPage(Request $req)
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

        return view('clientModule.pages.register.index', compact('data'));
    }

    public function registerUser()
    {

    }
}
