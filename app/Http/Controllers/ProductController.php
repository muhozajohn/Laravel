<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index(){
        // gett all products from database
        $products = Product::all();
        return view('products.index',['products' => $products]);
    }

    public function create(){
        return view('products.create');
    }

    // insert a new product
    public function store(Request $request){
        //Form validation
         $data = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric|decimal:0,2',  
            'description' => 'nullable|string',
        ]);

        //Create new product
         $newProduct = Product::create($data);

         if ($newProduct) {
            return redirect(route('product.index'))->with('success','Product has been Added successfully');

         }
         
         return back()->with('error', 'Failed to create product');

    }

    // egit dat

    public function edit(Product $product){
        return view('products.edit', ['product' => $product]);
    }

    public function update(Product $product, Request $request){
          //Form validation
          $data = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric|decimal:0,2',  
            'description' => 'nullable|string',
        ]);

        //Update product
        $product->update($data);

        return redirect(route('product.index'))->with('success','Product has been updated successfully');

    }

    public function destroy(Product $product){
        $product->delete();
        return redirect(route('product.index'))->with('success','Product has been deleted successfully');
    }
 
}
