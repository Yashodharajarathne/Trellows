<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;


use App\Models\Product;


class HomeController extends Controller
{

    public function index()
    {
        $product=Product::all();
        return view('home.userpage', compact('product'));
    }

    public function redirect()
    {
        $usertype=Auth::user()->usertype;

        if($usertype=='1')
        {
            return view('admin.home');
        }
        else
        {
            return view('home.userpage');
        }
    }

    public function show_product()
    {
        $product = Product::orderBy('id', 'desc')->get(); // Orders by 'id' in descending order
        return view('admin.show_product', compact('product'));
    }
}

