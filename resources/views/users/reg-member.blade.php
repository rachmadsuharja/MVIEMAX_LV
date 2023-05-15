@extends('layouts.main')

@section('navbar')
    @include('partials.navbar')
@endsection

@section('container')
<div class="container w-50 rounded p-2" style="margin-top: 6em; background: rgba(255,0,0,.5)">
    <div id="membership">
        <div class="container bg-transparent text-white p-0">
            <div class="container w-100 h-100 p-0 m-0 d-flex justify-content-center align-items-center" style="background: rgba(0,0,0,.5)">
                <div class="container-fluid w-75 p-3">
                    <div class="mb-3 d-flex justify-content-center align-items-center">
                        <h3>Gabung Membership</h3>
                    </div>
                        <form action="{{route('store-reg-member')}}" method="POST">
                            @csrf
                            <div class="mb-2">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name" placeholder="Name">
                                @error('name')
                                    <div class="alert alert-transparent p-0 text-white-50 mt-1"><i class="fa-solid fa-circle-exclamation"></i> {{$message}} </div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" value="{{old('email')}}" id="email" placeholder="name@example.com">
                                @error('email')
                                    <div class="alert alert-transparent p-0 text-white-50 mt-1"><i class="fa-solid fa-circle-exclamation"></i> {{$message}} </div>
                                @enderror
                            </div>
                            <div class="mb-2 d-flex justify-content-between">
                                <div style="width: 13.2em">
                                    <label for="password" class="form-label">Password</label>
                                    <input class="form-control" type="password" name="password" id="password" placeholder="Password..." aria-label="default input example">
                                </div>
                                <div style="width: 13.2em">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi password..." aria-label="default input example">
                                </div>
                            </div>
                            @error('password')
                                <div class="alert alert-transparent p-0 text-white-50 mt-1"><i class="fa-solid fa-circle-exclamation"></i> {{$message}} </div>
                            @enderror
                            <div class="mb-2 d-flex justify-content-between">
                                <div style="width: 13.2em">
                                    <label for="gender" class="form-label">Gender</label>
                                    <div class="form-control">
                                        <input type="radio" name="gender" value="Laki-laki" id="laki-laki" {{ old('gender') == 'Laki-laki' ? 'checked' : '' }}>
                                        <label for="laki-laki">Laki-laki</label>
                                        <input type="radio" name="gender" value="Perempuan" id="perempuan" {{ old('gender') == 'Perempuan' ? 'checked' : '' }}>
                                        <label for="perempuan">Perempuan</label>
                                    </div>
                                    @error('gender')
                                        <div class="alert alert-transparent p-0 text-white-50 mt-1"><i class="fa-solid fa-circle-exclamation"></i> {{$message}} </div>
                                    @enderror
                                </div>
                                <div style="width: 13.2em">
                                    <label for="role_id" class="form-label">Role</label>
                                    <select class="form-select" name="role_id" id="role_id" aria-label="Default select example">
                                        @foreach ($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-4 d-flex justify-content-between">
                                <p>Sudah punya akun? <a class="" href="/membership-login">Login</a></p>
                                <button type="submit" name="register" id="register" class="btn btn-danger mt-2 p-1">Buat Akun</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection