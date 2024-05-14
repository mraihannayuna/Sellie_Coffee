<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{

    //* ------------------------------------------ CATEGORY ----------------------------------------------------

    public function index()
    {
        return view('admin.index');
    }

    public function view_category()
    {
        $data = Category::all();

        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();

        toastr()->closeButton()->timeOut(3000)->addSuccess('Category Added Successfully');

        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data = Category::find($id);
        return view('admin.edit', compact('data'));
    }

    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();

        toastr()->closeButton()->timeOut(3000)->addSuccess('Category Edited Successfully');

        return redirect('/view_category');
    }

    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();

        toastr()->closeButton()->timeOut(3000)->addWarning('Category Deleted Successfully');

        return redirect()->back();
    }

    //! ------------------------------------------ END CATEGORY ----------------------------------------------------

    //* ------------------------------------------ PRODUCT ----------------------------------------------------

    public function add_product()
    {
        $category = Category::all();

        return view('admin.add_product', compact('category'));
    }

    public function upload_product(Request $request)
    {

        $data = new Product;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;
        // $data->category_id = $request?;

        $image = $request->image;

        if ($image) {

            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $imagename);

            $data->image = $imagename;
        }

        $data->save();


        toastr()->closeButton()->timeOut(3500)->addSuccess('Product Added Successfully');

        return redirect()->back();
    }

    public function view_product()
    {
        $products = Product::paginate(3);
        return view('admin.view_product', compact('products'));
    }

    public function delete_product($id)
    {
        $data =  Product::find($id);
        $data->delete();

        //? this is for deleting the images
        $image_path = public_path('products/' . $data->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        toastr()->closeButton()->timeOut(3000)->addWarning('Product Deleted Successfully');

        return redirect()->back();
    }

    public function edit_product($id)
    {
        $data = Product::find($id);
        $category = Category::all();
        return view('admin.update_page', compact('data', 'category'));
    }

    public function update_product(Request $request, $id)
    {
        $data = Product::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->description = $request->description;
        $data->category = $request->category;

        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $data->image = $imagename;
        }


        $data->save();

        toastr()->closeButton()->timeOut(3500)->addSuccess('Product Updated Successfully');

        return redirect('/view_product');
    }

    public function product_search(Request $request)
    {
        $search = $request->search;
        $products = Product::where('title', 'LIKE', '%' . $search . '%')->orWhere('category', 'LIKE', '%' . $search . '%')->paginate(3);

        return view('admin.view_product', compact('products'));
    }

    //! ------------------------------------------ END PRODUCT ----------------------------------------------------

}
