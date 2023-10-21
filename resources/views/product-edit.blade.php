@extends('layouts.app')

@section('title', 'Edit product')

@section('header')
<div class="d-flex align-items-center" >
    @parent
    <div>
        <h3><i class="fa-solid fa-chevron-right"></i></h3>
    </div>
    <div>
        <h3> <a href="{{route('products.index');}}" class="nav-link text-light">Products</a></h3>
    </div>
    <div>
        <h3><i class="fa-solid fa-chevron-right"></i></h3>
    </div>
    <div>
        <h3> <a href="" class="nav-link text-light" style="pointer-events: none;">Edit {{$product->name}}</a></h3>
    </div>
    <div class="ml-auto">
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
{{-- lưu ý enctype của form để upload file --}}
<form action="{{route('products.update',['product' => $product])}}" method="POST" enctype="multipart/form-data" class="w-70 m-auto border p-5">
    @csrf
    @method("PUT")

    {{-- name --}}
    <div class="mb-3">
        <label for="name" class="form-label">Product name </label>
        <input type="text" name="name" value="{{old('name', $product->name)}}" class="form-control">
        <p class="text-light text-uppercase font-weight-bold">
            @if($errors->has('name')) {{$errors -> first('name')}} @endif
        </p>
    </div>

    {{-- price --}}
    <div class="mb-3">
        <label for="price" class="form-label">Price </label>
        <input type="number" name="price" value="{{old('price', $product->price)}}" class="form-control">
        <p class="text-light text-uppercase font-weight-bold">
            @if ($errors -> has('price')) {{$errors ->first('price')}} @endif
        </p>
    </div>

    {{-- category --}}
    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select name="category" id="" class="form-select">
            <option value="">Choose one</option>
                @foreach ($lst as $cat)
                    <option value="{{$cat->id}}" @if ($cat -> id == old('catagory', $product->category_id)) selected
                        @endif>{{$cat->name}}</option>
                @endforeach
        </select>
        <p  class="text-light text-uppercase font-weight-bold">
            @if ($errors -> has('category')) {{$errors -> first('category')}} <br> @endif
        </p>
    </div>

    {{-- description --}}
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="" cols="20" rows="5" class="form-control">{{old('description', $product->description)}}</textarea>
        <p  class="text-light text-uppercase font-weight-bold">
            @if ($errors -> has('description')) {{$errors -> first('description')}} <br> @endif
        </p>
    </div>

    {{-- image --}}
    <div class="mb-3 d-flex flex-column" style="gap:8px;">
        <label for="image" class="form-label mb-0">Image</label>
        <img src="{{$product->image}}" alt="" class="img-thumbnail w-50">
        <input type="file" accept="image/" name="image">
        <p  class="text-light text-uppercase font-weight-bold">
            @if($errors -> has('image')) {{$errors ->first('image')}}@endif
        </p>
    </div>
    <button type="submit" class="btn btn-success"><i class="fa-solid fa-check"></i> Submit</button>
</form>
@endsection
