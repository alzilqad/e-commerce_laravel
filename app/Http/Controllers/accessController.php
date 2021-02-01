<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class accessController extends Controller
{
    public function showRegisterPage(Request $req){
        return view('clientModule.register.index');
    }
}
