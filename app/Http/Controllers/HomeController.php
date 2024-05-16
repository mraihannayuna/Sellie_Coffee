<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Coffee;
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

        // Buat fungsi untuk mendapatkan nama kategori dari ID
        function getCategoryName($categoryId, $categories) {
            foreach ($categories as $category) {
                if ($category->id == $categoryId) {
                    return $category->category_name;
                }
            }
            return null; // Kembalikan null jika kategori tidak ditemukan
        }

        // Buat fungsi untuk mengelompokkan produk berdasarkan kategori
        function groupProductsByCategory($products, $categories) {
            $groupedProducts = [];
            foreach ($products as $product) {
                $categoryId = $product->category_id;
                $categoryName = getCategoryName($categoryId, $categories);
                if (!isset($groupedProducts[$categoryName])) {
                    $groupedProducts[$categoryName] = [];
                }
                $groupedProducts[$categoryName][] = $product;
            }
            return $groupedProducts;
        }

        $groupedProducts = groupProductsByCategory($coffee, $category);

        return view('home.menu', compact('groupedProducts'));
    }

    public function produk() {
        $coffee = Coffee::all();

        return view('home.produk', compact('coffee'));

    }

    public function location() {

        return view('home.location');

    }

    public function contact() {

        return view('home.contact');

    }

}
