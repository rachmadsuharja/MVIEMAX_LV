@extends('layouts.main')

@section('embed')
    <link rel="stylesheet" href="/css/.css">
@endsection

@section('navbar')
    @include('partials.admin-navbar')
@endsection

@section('container')
    <div class="container mt-5 bg-transparent">
        <div class="tbHead w-100 d-flex justify-content-around align-items-center">
            <div class="input-group mb-3 mt-3 w-25">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-secondary text-white" id="inputGroup-sizing-default">Cari</span>
                </div>
                <input type="text" id="searchInput" onkeyup="search()" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>
            <a class="btn btn-primary p-1 m-2" href="/admin/publishers/add-publisher"><i class="fa-solid fa-circle-plus"></i> Tambah</a>
        </div>
        <table id="table" class="table table-dark" style="color: #dddd;">
            <thead>
                <th class="bg-secondary text-white" scope="col">Publisher Settings</th>
                <th class="bg-secondary text-white" scope="col">Username</th>
                <th class="bg-secondary text-white" scope="col">No. Telpon</th>
                <th class="bg-secondary text-white" scope="col">Alamat</th>
            </thead>
            @foreach($publisher as $pub)
            <tr>
                <th class="d-flex">
                    <a class="btn btn-outline-primary p-1" href="/admin/publishers/edit-publisher/{{$pub->id}}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                    &nbsp;
                        <form method="post" action="{{route('delete-publisher', ['id' => $pub->id])}}">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Anda yakin?')"><i class="fa-solid fa-trash"></i> Hapus</button>
                        </form>
                </th>
                <td>{{$pub->username}}</td>
                <td>{{$pub->no_telp}}</td>
                <td>{{$pub->address}}</td>
            </tr>
            @endforeach
        </table>
        {{$publisher->links()}}
    </div>
@endsection