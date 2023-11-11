@extends('layouts.app')

@section('title','user Product details')

@section('header')
    <div>
        <h3><i class="fa-solid fa-chevron-right"></i> </h3>
    </div>
    <div>
        <h3><a href="" class="nav-link text-dark nav" id='products'>Products</a></h3>
    </div>
    <div>
        <h3><i class="fa-solid fa-chevron-right"></i></h3>
    </div>
    <div>
        <h3> <a href="#" class="nav-link text-dark">Details</a></h3>
    </div>
@endsection

@section('content')
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
                <a href="{{route('products.userindex')}}" class="btn btn-secondary">Turn back</a>
            </div>
        </div>
    </div>
    <div id="product-image" data-image="{{ $product->image }}"></div>
@endsection

@section('script')
<script>
    document.getElementById('home').innerHTML = `<i class="fa-solid fa-house text-dark"></i>`;
    document.getElementById('products').innerHTML = `<i class="fa-solid fa-cart-shopping"></i>`;
</script>
@endsection
