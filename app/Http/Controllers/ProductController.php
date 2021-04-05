<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return Product::all();
    }

    public function show($id){
        // return "hello";
        return Product::find($id);
    }

    public function search($name){
        // return "hello";
        return Product::where('name','like','%'.$name.'%')->get();
    }


    public function store(Request $request){

        // return $request;
        $request->validate([
            'name'=>'required',
            'slug'=>'required',
            'price'=>'required'
        ]);
        return Product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'desc' => $request->desc,
            'price' => $request->price
        
        ]);
    }


    public function destroy($id){
    //    return Product::destroy($id);
        if(Product::destroy($id)){
            return 'deleted';
        }else{
            return "not deleted";
        }
    }
    public function update(Request $request,$id){
        $product = Product::find($id);
        $product->update($request->all());
        return $product;
        
    }
}
