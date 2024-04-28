<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index()
    {
       
        $products = Product::all();
        return view('products.index',['products' => $products]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric', // Use 'numeric' instead of 'number'
            'price' => 'required|numeric|between:0,99999.0', // Validate numeric and set a range
            'description' => 'nullable'

        ]);

        $newProduct = Product::create($data);

        /* return redirect()->route('product.index'); // Use 'route' function */

        return redirect(route('product.index'));
    }


    public function edit(Product $product){
        return view('products.edit',['product' =>$product]);

    }

    public function updateProduct(Product $product, Request $request): RedirectResponse
    {
        $data = $request->all();

        $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric', // Use 'numeric' instead of 'number'
            'price' => 'required|numeric|between:0,99999.0', // Validate numeric and set a range
            'description' => 'nullable'

        ]);
        $product->update($data);
        return redirect(route('product.index'))->with('success','Product Updated Successfully');

    }

    public function delete(Product $product ){
        $product->delete();

        return redirect(route('product.index'))->with('success','Product Deleted Successfully');
    }
    

}






