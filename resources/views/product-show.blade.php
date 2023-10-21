@extends('layouts.app')

@section('title','Product details')

@section('header')
<div class="d-flex align-items-center">
    @parent
    <div>
        <h3><i class="fa-solid fa-chevron-right"></i> </h3>
    </div>
    <div>
        <h3><a href="{{route('products.index');}}" class="nav-link text-light">Products</a></h3>
    </div>
    <div>
        <h3><i class="fa-solid fa-chevron-right"></i></h3>
    </div>
    <div>
        <h3> <a href="#" class="nav-link text-light">{{$product->name}}</a></h3>
    </div>
    <div class="ml-auto pr-4">
        @auth
            <h1 class="text-light">Hello {{Auth::user()->name}}</h1>
        @endauth
        @guest
            <a href="{{route('login')}}" class="btn btn-danger">Login</a>
        @endguest
    </div>
</div>
@endsection

@section('content')
    <div class="col-md-12 d-inline-flex align-items-center" style="gap: 20px">
        <h1>{{$product->name}} <i class="fa-solid fa-circle-right"></i></h1>
        <a href="{{route('products.edit', ['product' => $product])}}" class="btn btn-primary"><i class="fa-solid fa-circle-right"></i> Edit this product!</a>
        <h1><i class="fa-solid fa-circle-right"></i></h1>
        <form action="{{route('products.destroy',['product'=>$product])}}"
            method="post" onsubmit="return confirm('Do you want to delete this product?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete this product!</button>
        </form>
    </div>
    <div class="card h-100 col-sm-12 mb-3 d-flex flex-row py-4">
        <div class="col-sm-6">
            <img class="card-img-top" src="/storage/{{$product->image}}" alt="Avatar">
        </div>
        <div class="col-sm-6">
            <div class="card-body">
                <h4 class="card-title">{{$product->name}}</h4>
                <p class="card-text text-success">${{$product->price}}</p>
                <p class="card-text">{{$product->description}}</p>
            </div>
            <div class="card-footer">
                <a href="{{route('products.index')}}" class="btn btn-secondary">Turn back</a>
            </div>
        </div>
    </div>
    <div id="product-image" data-image="{{ $product->image }}"></div>
    <script>
        var productImage = document.getElementById('product-image').getAttribute('data-image');
        console.log(productImage);
    </script>
@endsection
