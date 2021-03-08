<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;

class accessController extends Controller
{
    public function login(Request $req)
    {
        $req->validate([
            'id' => 'required',
            'pass' => 'required'
        ]);

        $user = User::where('password', $req->pass)
            ->where('email', $req->id)
            ->orWhere('phone', $req->id)
            ->first();

        return URL::previous();
    }

    public function loginUser(Request $req)
    {
        $req->validate([
            'id' => 'required',
            'pass' => 'required'
        ]);

        $user = User::where('password', $req->pass)
            ->where('email', $req->id)
            ->orWhere('phone', $req->id)
            ->first();

        return URL::previous();
    }

    public function logoutUser()
    {
    }

    public function showLoginPage(Request $req)
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

        return view('clientModule.pages.login.index', compact('data'));
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
