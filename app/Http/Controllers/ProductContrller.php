<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductContrller extends Controller
{
    //
    public function index(){
        $products = Product::all();
        return view('products.index',['products' => $products]);
    }

    public function create(){
        return view('products.create');
    }

    public function submit(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'qty' =>  'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'required|nullable'
        ]);
        $newProduct = Product::create($data);

        return redirect(route('product.index'));
    }


    public function edit(Product $product){
        return view('products.edit',['product'=>$product]);
    }

    public function update(Product $product,Request $request){
        $data = $request->validate([
            'name' => 'required',
            'qty' =>  'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'required|nullable'
        ]);

        $product->update($data);

        return redirect(route('product.index'));
    }

    public function delete(Product $product){
        $product->delete();
        return redirect(route('product.index'));
    }
    
}
