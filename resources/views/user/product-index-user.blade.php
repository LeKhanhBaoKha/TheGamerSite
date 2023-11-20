@extends('layouts.app')
{{-- 'layouts' là tên folder, 'app' là tên file, không có phần đuôi blade.php --}}
@section('title', 'user product list')
@section('CSS')
<link rel="stylesheet" href="/css/animate.css">
@endsection

@section('header')
    <div><h3><i class="fa-solid fa-chevron-right"></i></h3></div>
    <div class="product">
        <h3><a href="{{route('products.userindex')}}" class="nav-link text-dark nav"><i class="fa-solid fa-cart-shopping"></i> Products</a></h3>
    </div>
@endsection

@section('content')
    <div class="col-md-12 d-inline-flex align-items-center" style="gap: 20px">
        <h1 class="">Welcome to our product list</h1>

    </div>
    <div class="row mt-2">
    @foreach ($lst as $product)
        <div class="col-sm-3 mb-3">
            <div class="card h-100">
                <img src="{{$product->image}}" alt="img" class="card-img-top img-fluid" style="max-height: 120px; max-width:252px;">
                <div class="card-body">
                    <h4 class="card-title"><a href="{{route('products.usershow', ['product'=>$product])}}" style="color:black" class="title">{{$product->name}} </a> </h4>
                    <p class="card-text text-success">${{ number_format($product->price, 2) }}</p>
                    <p class="card-text" id="des">{{$product->description}}</p>
                </div>
                <div class="card-footer bg-white border-0">
                    <a href="{{route('products.usershow',['product'=>$product])}}" class="btn btn-primary">Check out!</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>

@endsection



