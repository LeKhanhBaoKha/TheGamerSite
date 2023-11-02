@extends('layouts.app')
{{-- 'layouts' là tên folder, 'app' là tên file, không có phần đuôi blade.php --}}
@section('title', 'product list')
@section('CSS')
<link rel="stylesheet" href="/css/animate.css">
@endsection
@section('header')
    <div><h3><i class="fa-solid fa-chevron-right"></i></h3></div>
    <div class="product">
        <h3><a href="{{route('products.index')}}" class="nav-link text-dark nav"><i class="fa-solid fa-cart-shopping"></i> Products</a></h3>
    </div>
@endsection

@section('content')
    <div class="col-md-12 d-inline-flex align-items-center" style="gap: 20px">
        <h1 class="">Product list <i class="fa-solid fa-circle-right"></i></h1>
        <a href="{{route('products.create')}}" class="text-success btn btn-light border"><h4>Add product! <i class="fa-solid fa-circle-plus text-success"></i></h4></a>
    </div>
    <div class="row mt-2">
    @foreach ($lst as $product)
        <div class="col-sm-3 mb-3">
            <div class="card h-100">
                <img src="{{$product->image}}" alt="" class="card-img-top img-fluid" style="max-height: 120px; max-width:252px;">
                <div class="card-body">
                    <h4 class="card-title"><a href="{{route('products.show',['product'=>$product])}}" style="color:black">{{$product->name}} </a> </h4>
                    <p class="card-text text-success">${{ number_format($product->price, 2) }}</p>
                    <p class="card-text" id="des">{{$product->description}}</p>
                </div>
                <div class="card-footer bg-white border-0 d-flex align-items-center" style="gap:10px">
                    <a href="{{route('products.edit', ['product' => $product])}}" class="btn btn-primary"><i class="fa-solid fa-wrench"></i> Edit</a>
                    <form action="{{route('products.destroy',['product'=>$product])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" onclick="showModal({{ $product->id }})">
                            <i class="fa-solid fa-trash"></i> Delete
                        </button>
                        <div id="Modal-{{ $product->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="hideModal({{$product->id}})">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có chắc chắn muốn xóa sản phẩm này không?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="hideModal({{$product->id}})">Không</button>
                                        <button type="submit" class="btn btn-primary">Có</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endforeach
    </div>

@endsection

@section('script')
<script>
    // function showModal(productId) {
    //     $('#Modal-' + productId).modal('show');
    // }

    // function hideModal(productId) {
    //     $('#Modal-' + productId).modal('hide');
    // }

    function showModal(productId) {
        var modal = document.getElementById('Modal-' + productId);
        modal.classList.add('show');
        modal.style.display = 'block';
    }

    function hideModal(productId) {
        var modal = document.getElementById('Modal-' + productId);
        modal.classList.remove('show');
        modal.style.display = 'none';
    }
</script>
@endsection
