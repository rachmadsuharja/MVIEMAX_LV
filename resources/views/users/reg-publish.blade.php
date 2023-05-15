@extends('layouts.main')

@section('navbar')
    @include('partials.navbar')
@endsection

@section('container')
<div class="container w-50 rounded p-2" style="margin-top: 6em; background: rgba(255,0,0,.5)">
    <div id="publisher">
        <div class="container bg-transparent text-white p-0">
            <div class="container w-100 h-100 p-0 m-0 d-flex justify-content-center align-items-center" style="background: rgba(0,0,0,.5)">
                <div class="container-fluid w-75 p-3">
                <div class="mb-3 d-flex justify-content-center align-items-center">
                    <h3>Register Publisher</h3>
                </div>
                <form action="{{route('store-reg-publisher')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input class="form-control" type="text" name="username" value="{{old('username')}}" id="username" placeholder="Username..." aria-label="default input example">
                    </div>
                    @error('username')
                        <div class="alert alert-transparent p-0 text-white-50 mt-1"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</div>
                    @enderror
                    <div class="mb-3 d-flex justify-content-between">
                        <div style="width: 13em">
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control" type="password" name="password" id="password" placeholder="Password..." aria-label="default input example">
                        </div>
                        <div style="width: 13em">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password..." aria-label="default input example">
                        </div>
                    </div>
                    @error('password')
                        <div class="alert alert-transparent p-0 text-white-50 mt-1"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="no_telp" class="form-label">No. Telpon</label>
                        <input class="form-control" type="text" name="no_telp" value="{{old('no_telp')}}" id="no_telp" placeholder="Telpon..." aria-label="default input example">
                    </div>
                    @error('no_telp')
                        <div class="alert alert-transparent p-0 text-white-50 mt-1"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</div>
                    @enderror
                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Alamat..." id="address" name="address" style="height: 100px; resize:none;">{{old('address')}}</textarea>
                            <label for="address" class="text-dark">Alamat</label>
                        </div>
                    </div>
                    @error('address')
                        <div class="alert alert-transparent p-0 text-white-50 mt-1"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</div>
                    @enderror
                    <div class="mb-3 d-flex justify-content-between">
                        <p>Sudah punya akun? <a class="" href="/publisher-login">Login</a></p>
                        <button type="submit" name="register" id="register" class="btn btn-danger mt-2 p-1">Buat Akun</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection