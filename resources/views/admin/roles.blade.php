@extends('layouts.main')

@section('embed')
    <link rel="stylesheet" href="/css/.css">
@endsection

@section('navbar')
    @include('partials.admin-navbar')
@endsection

@section('container')
    <div class="m-0 p-5">
        <div class="tbHead w-100 d-flex justify-content-around align-items-center">
            <div class="input-group mb-3 mt-3 w-25">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-secondary text-white" id="inputGroup-sizing-default">Cari</span>
                </div>
                <input type="text" id="searchInput" onkeyup="search()" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>
            <a class="btn btn-primary p-1 m-2" href="/admin/roles/add-role"><i class="fa-solid fa-circle-plus"></i> Tambah Role</a>
        </div>
        <table id="table" class="table table-dark" style="color: #dddd;">
            <thead>
                <th class="bg-secondary text-white" scope="col">Role Settings</th>
                <th class="bg-secondary text-white" scope="col">Nama</th>
                <th class="bg-secondary text-white" scope="col">Fitur</th>
                <th class="bg-secondary text-white" scope="col">Harga</th>
                <th class="bg-secondary text-white" scope="col">Limit</th>
            </thead>
            @foreach ($roles as $role)
                <tr>
                    <th class="d-flex">
                        <a class="btn btn-outline-primary p-1" href="/admin/roles/edit-role/{{$role->id}}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        &nbsp;
                        <form method="post" action="{{route('delete-role', ['id' => $role->id])}}">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Anda yakin?')"><i class="fa-solid fa-trash"></i> Hapus</button>
                        </form>
                    </th>
                    <td>{{$role->name}}</td>
                    <td>{{$role->features}}</td>
                    <td>{{$role->price}}</td>
                    <td>{{$role->role_limit}} Bulan</td>
                </tr>
            @endforeach
        </table>
        {{$roles->links()}}

    </div>
@endsection
