<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function fixImage(Product $product)
    {
        if($product->image  && Storage::disk('public')->exists($product->image)){
            $product->image= Storage::url($product->image);
        }
        else{
            $product->image='/images/noImage.jpg';
        }
    }


    public function index()
    {
        $lst=Product::all();

        foreach($lst as $product)
        {
            $this->fixImage($product);
        }
        return view('product-index',['lst'=>$lst]);
    }

    public function userindex()
    {
        $lst=Product::all();

        foreach($lst as $product)
        {
            $this->fixImage($product);
        }
        return view('user.product-index-user',['lst'=>$lst]);
    }
    public function usershow(Product $product){
        return view('user.product-show-user', ['product'=>$product]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lst=Category::all();
        return view('product-create',['lst'=>$lst]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

        $request->validate([
            'name' => "required|min:5|max:30",
        ],[
            'required' => ':attribute không bỏ trống'
        ],[
            'name' => 'tên đăng nhập'
        ]);
        $p = Product::create([
            'name' => $request -> name,
            'price' => $request -> price,
            'category_id' => $request -> category,
            'description' => $request -> description,
            // Hình ảnh cập nhật khi có Id sản phẩm, Image will be update when they have ProductId
            'image' => $request -> image
        ]);
        // đường dẫn(path) lưu hình có id sản phẩm để dễ quản lý
        $path = $request -> image -> store('upload/product/'.$p->id,'public');
        $p -> image = $path;
        $p->save();

        // redirect về trang ds sản phẩm
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product-show', ['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->fixImage($product);
        $lst = Category::all();
        return view('product-edit', ['product'=>$product, 'lst' => $lst]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //kiem tra co cap nhat hinh khong
        $path=$product -> image;
        if($request->hasFile('image') && $request->image->isvalid()){
            $path = $request->image->store('upload/product/'.$product->id,'public');
        }

        $product -> fill([
            'name' => $request -> name,
            'price' => $request -> pr0ice,
            'category_id' => $request -> category,
            'description' => $request -> description,
            'image' => $path
        ]);
        $product->save();

        // redirect về trang ds sản phẩm
        return redirect()->route('products.show', ['product'=> $product]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product -> delete();

        return redirect()-> route('products.index');
    }
}
