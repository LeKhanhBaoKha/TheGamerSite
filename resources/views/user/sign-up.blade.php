@extends('layouts.app')

@section('title', 'Sign up')

@section('content')
    <form action="/register" method="POST">
        @csrf
        <label for="name" class="form-label">Username</label>
        <input type="text" name="name" class="form-control">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control">
        <label for="password"  class="form-label">Password</label>
        <input type="password" name="password" class="form-control">
        <button type="submit">Sign up</button>
    </form>
@endsection
