<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    //api không có create và edit

    public function index(){
        return Product::get();
    }

    public function store(Request $request)
    {
        $product = Product::create(
        [
            'name' => $request ->input('name'),
            'price' => $request -> input('price'),
            'category_id' => $request -> input('category_id'),
            'description' => $request -> input('description'),
            'image' => ''
        ]);
        if($request->hasFile('image')){
        $path = $request -> image -> store('upload/product/'.$product->id,'public');
        $product ->image = $path;
        }
        $product->save();
        return $product;
    }

    public function show($id){
        return Product::find($id);
    }

    public function update(Request $request, $id){
        return Product::find($id)->update($request->all());
    }

    public function destroy($id){
        return Product::find($id)->delete();
    }
}

