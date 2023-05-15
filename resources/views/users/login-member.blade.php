@extends('layouts.login')

@section('form-head')
    <form action="{{route('store-login-member')}}" method="POST">
    @csrf
@endsection

@section('user-login-title')
    <h1 class="h3 mb-3 text-white" style="font-family: 'Fjalla One'">Login Membership</h1>
@endsection

@section('input-user')
    <div class="form-floating mb-3">
        <input type="text" class="form-control" style="background-color: #FFFDD0; color:#291F1E" name="email" id="email" placeholder="Email" autofocus>
        <label for="email">Email</label>
    </div>
    @error('email')
        <div class="alert alert-transparent p-0 text-white-50 mt-1"><i class="fa-solid fa-circle-exclamation"></i> {{$message}} </div>
    @enderror
    <div class="form-floating mb-3">
        <input type="password" class="form-control" style="background-color: #FFFDD0; color:#291F1E" name="password" id="password" placeholder="Password">
        <label for="password">Password</label>
    </div>
    @error('password')
        <div class="alert alert-transparent p-0 text-white-50 mt-1"><i class="fa-solid fa-circle-exclamation"></i> {{$message}} </div>
    @enderror
    <button class="w-100 mb-3 btn btn-lg text-dark" name="submit" id="submit" type="submit" style="background-color:#FFAC42">Login</button>
@endsection

@section('form-footer')
    <a class="d-flex justify-content-center mb-3 p-1 w-25 btn btn-dark" href="/membership-forgot-password">Lupa Password?</a>
    <div class="create-container mt-3 mb-5 p-0">
        <p class="text-white">Belum punya akun? <a class="mt-2 mb-2 p-1 text-white" href="/membership-register">buat akun</a></p>
    </div>
@endsection