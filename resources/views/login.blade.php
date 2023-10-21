@extends('layouts.app')

@section('title', 'Login')
@section('header')
<div class="d-flex align-items-center">
    @parent
    <div class="ml-auto">
        @auth
            <h1>Hello {{Auth::user()->name}}</h1>
        @endauth
        @guest
            <a href="{{route('login')}}" class="btn btn-danger">Login</a>
        @endguest
    </div>
</div>
@endsection
@section('content')
    {{-- <div class="row justify-content-center container">
        <form action="" class="col-md-12 w-250px" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="email" class="text-light font-weight-bold">Email</label>
                <input type="email" name="email" class="form-control">
                <p class="text-light font-weight-bold text-uppercase">
                    @if($errors->has('email')){{$errors->first('email')}}@endif
                </p>
            </div>

            <div class="form-group">
                <label for="password" class="text-light font-weight-bold">Password</label>
                <input type="password" name="password" class="form-control">
                <p class="text-light font-weight-bold text-uppercase">
                    @if($errors->has('password')){{$errors->first('password')}}@endif
                </p>
            </div>
            <button type="submit" class="btn btn-success">Login</button>
        </form>
    </div> --}}
    <div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="/images/longvic.jpg" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form method="POST" action="{{route('login')}}" enctype="multipart/form-date">
                        @csrf
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="email" class="form-control input_user" value="" placeholder="email">
                            <p class="text-dark font-weight-bold text-uppercase">
                                @if($errors->has('email')){{$errors->first('email')}}@endif
                            </p>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" value="" placeholder="password">
                            <p class="text-dark font-weight-bold text-uppercase">
                                @if($errors->has('password')){{$errors->first('password')}}@endif
                            </p>
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label text-dark" for="customControlInline">Remember me</label>
							</div>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" name="button" class="btn login_btn">Login</button>
				   </div>
					</form>
				</div>

				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Don't have an account? <a href="#" class="ml-2">Sign Up</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="#">Forgot your password?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
