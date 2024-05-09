<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home()
    {

        return view('home.index');
    }

    public function menu() {

        return view('home.menu');

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
