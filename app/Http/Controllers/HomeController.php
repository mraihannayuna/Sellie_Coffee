<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home()
    {

        return view('home.index');
    }

    public function menu() {
        $coffee = Product::all();
        $category = Category::all();


        return view('home.menu',compact('coffee','category'));

    }

    public function produk() {

        return view('home.produk');

    }

    public function location() {

        return view('home.location');

    }

    public function contact() {

        return view('home.contact');

    }

}
