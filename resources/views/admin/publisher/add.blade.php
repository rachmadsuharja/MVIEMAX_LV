@extends('layouts.main')

@section('embed')
    <link rel="stylesheet" href="/css/checkbox-grid.css">
@endsection

@section('container')
    <div class="container bg-transparent mt-5">
        <div class="container bg-transparent w-100 h-100 p-3 d-flex justify-content-center align-items-center">
            <div class="container-fluid w-50 px-5 py-3 rounded" style="background: rgba(255,0,0, .6)">
                <div class="mb-3 d-flex justify-content-center">
                    <h3 style="color:#dfdfdf">Tambah Publisher</h3>
                </div> 
                <form action="{{route('store-publisher')}}" method="POST">
                    @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input class="form-control" type="text" name="username" value="{{old('username')}}" id="username" placeholder="Username..." aria-label="default input example">
                            @error('username')
                                <div class="alert alert-transparent p-0 text-white-50 mt-1"><i class="fa-solid fa-circle-exclamation"></i> {{$message}} </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="no_telp" class="form-label">No. Telpon</label>
                            <input class="form-control" type="text" name="no_telp" value="{{old('no_telp')}}" id="no_telp" placeholder="Telpon..." aria-label="default input example">
                            @error('no_telp')
                                <div class="alert alert-transparent p-0 text-white-50 mt-1"><i class="fa-solid fa-circle-exclamation"></i> {{$message}} </div>
                            @enderror
                        </div>
                        <div class="pass-container d-flex justify-content-between">
                            <div class="mb-3" style="width: 13.5em">
                                <label for="password" class="form-label">Password</label>
                                <input class="form-control" type="password" name="password" id="password" placeholder="Password..." aria-label="default input example">
                            </div>
                            <div class="mb-3" style="width: 13.5em">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password..." aria-label="default input example">
                            </div>
                        </div>
                        @error('password')
                            <div class="alert alert-transparent p-0 text-white-50 mt-1"><i class="fa-solid fa-circle-exclamation"></i> {{$message}} </div>
                        @enderror
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Alamat..." id="address" name="address" style="height: 100px; resize:none;">{{old('address')}}</textarea>
                                <label for="address" class="text-dark">Alamat</label>
                            </div>
                            @error('address')
                                <div class="alert alert-transparent p-0 text-white-50 mt-1"><i class="fa-solid fa-circle-exclamation"></i> {{$message}} </div>
                            @enderror
                        </div>
                        <div class="mb-3 d-flex justify-content-between">
                            <a href="/admin/publishers" class="btn btn-secondary">Kembali</a>
                            <button type="submit" name="submit" id="submit" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection