<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Coffee;
use App\Models\Cart;
use App\Models\User;
use Midtrans\Config;
use Midtrans\Snap;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home()
    {

        return view('home.index');
    }

    public function menu()
    {
        $coffee = Product::all();
        $category = Category::all();

        // Buat fungsi untuk mendapatkan nama kategori dari ID
        function getCategoryName($categoryId, $categories)
        {
            foreach ($categories as $category) {
                if ($category->id == $categoryId) {
                    return $category->category_name;
                }
            }
            return null; // Kembalikan null jika kategori tidak ditemukan
        }

        // Buat fungsi untuk mengelompokkan produk berdasarkan kategori
        function groupProductsByCategory($products, $categories)
        {
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

    public function produk()
    {
        $coffee = Coffee::all();
        $count = null;

        if (Auth::user()) {
            $user_id = Auth::user()->id;
            $count = Cart::where('user_id', $user_id)->count();
        }

        return view('home.produk', compact('coffee', 'count'));
    }

    public function location()
    {

        return view('home.location');
    }

    public function contact()
    {

        return view('home.contact');
    }

    public function mycart()
    {
        $count = null;
        $carts = null;
        $total = 0;

        if (Auth::user()) {
            $user_id = Auth::user()->id;
            $count = Cart::where('user_id', $user_id)->count();
            $carts = Cart::where('user_id', $user_id)->with('product')->orderBy('id', 'desc')->get();
            foreach ($carts as $cart) {
                $price = $cart->product->price * 1000;
                $total += $price;
            }
        }

        return view('home.mycart', compact('carts', 'count', 'total'));
    }

    public function addToCart($productId)
    {
        $user_id = Auth::user()->id;

        $cart = new Cart;
        $cart->user_id = $user_id;
        $cart->product_id = $productId;
        $cart->save();

        return redirect()->back()->with('success', 'Item added to cart successfully.');
    }

    public function removeFromCart($cartId)
    {
        Cart::destroy($cartId);

        return redirect()->back()->with('success', 'Item removed from cart successfully.');
    }

    public function add_cart($id)
    {

        if (Auth::user() == true) {
            $product_id = $id;

            $user_id = Auth::user()->id;

            $data = new Cart;

            $data->user_id = $user_id;
            $data->product_id = $product_id;

            $data->save();

            toastr()->closeButton()->timeOut(3000)->addSuccess('Product Added To Cart Successfully');
        } else {
            toastr()->closeButton()->timeOut(5000)->addWarning('Mohon Login Terlebih Dahulu!');
        }

        return redirect()->back();
    }
}
