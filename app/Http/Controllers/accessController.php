<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class accessController extends Controller
{
    public function login()
    {
        
    }

    public function showRegisterPage(Request $req)
    {
        return view('clientModule.pages.register.index');
    }

    public function registerUser()
    {

    }
}
