<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Faker\Provider\Lorem;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    //api không có create và edit

    public function index(){
        return Product::with('category')->get();
    }

    public function store(Request $request)
    {
        return Product::with('category')->create($request->all());
    }

    public function show($id){
        return Product::with('category')->find($id);
    }

    public function update(Request $request, $id){
        return Product::with('category')->find($id)->update($request->all());
    }
}

