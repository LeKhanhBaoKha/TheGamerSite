@extends('layouts.app')

@section('title', 'Add product')

@section('header')
<div class="d-flex align-items-center">
    @parent
    <div>
        <h3><i class="fa-solid fa-chevron-right"></i></h3>
    </div>
    <div>
        <h3><a href="{{route('products.index')}}" class="nav-link text-dark nav"><i class="fa-solid fa-cart-shopping"></i></a></h3>
    </div>
    <div>
        <h3><i class="fa-solid fa-chevron-right"></i></h3>
    </div>
    <div>
        <h3><p class="m-0 p-0 ml-3 text-dark">Add product</p></h3>
    </div>
</div>
@endsection

@section('content')
{{-- lưu ý enctype của form để upload file --}}
<form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data" class="w-70 m-auto border p-5">
    @csrf

    {{-- Name --}}
    <div class="mb-3">
        <label for="name" class="form-label">Product name </label>
        <input type="text" name="name" value="{{old('name')}}" class="form-control"><br>
        <p class="text-light text-uppercase font-weight-bold">
            @if($errors->has('name')) {{$errors -> first('name')}} @endif
        </p>

    {{-- price --}}
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price </label>
        <input type="number" name="price" value="{{old('price')}}" class="form-control"><br>
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
                    <option value="{{$cat->id}}" @if ($cat -> id == old('catagory')) selected
                        @endif>{{$cat->name}}</option>
                @endforeach
        </select><br>
        <p  class="text-light text-uppercase font-weight-bold">
            @if ($errors -> has('category')) {{$errors -> first('category')}} <br> @endif
        </p>
    </div>

    {{-- description --}}
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="" cols="30" rows="10" class="form-control">{{old('description')}}</textarea><br>
        <p  class="text-light text-uppercase font-weight-bold">
            @if ($errors -> has('description')) {{$errors -> first('description')}} <br> @endif
        </p>
    </div>

    {{-- image --}}
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" accept="image/" name="image" ><br>
        <p  class="text-light text-uppercase font-weight-bold">
            @if($errors -> has('image')) {{$errors ->first('image')}}@endif
        </p>
    </div>

    <button type="submit" class="btn btn-success"><i class="fa-solid fa-check"></i> Submit</button>
</form>
@endsection

@section('script')
<script>
    document.getElementById('home').innerHTML = `<i class="fa-solid fa-house text-dark"></i>`;
</script>
@endsection
