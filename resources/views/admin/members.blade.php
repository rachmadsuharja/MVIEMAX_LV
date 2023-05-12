@extends('layouts.main')

@section('embed')
    <link rel="stylesheet" href="/css/checkbox-grid.css">
@endsection

@section('navbar')
    @include('partials.admin-navbar')
@endsection

@section('container')
    <div class="container bg-transparent mt-5">
        <div class="tbHead w-100 d-flex justify-content-around align-items-center">
            <div class="input-group mb-3 mt-3 w-25">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-secondary text-white" id="inputGroup-sizing-default">Cari</span>
                </div>
                <input type="text" id="searchInput" onkeyup="search()" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>
            <a class="btn btn-primary p-1 m-2" href="/admin/memberships/add-member"><i class="fa-solid fa-circle-plus"></i> Tambah</a>
        </div>
        <table id="table" class="table table-dark" style="color: #dddd;">
            <thead>
                <th class="bg-secondary text-white" scope="col">Member Settings</th>
                <th class="bg-secondary text-white" scope="col">Name</th>
                <th class="bg-secondary text-white" scope="col">Email</th>
                <th class="bg-secondary text-white" scope="col">Gender</th>
                <th class="bg-secondary text-white" scope="col">Role</th>
            </thead>
            @foreach ($member as $m )
                <tr>
                    <th class="d-flex">
                        <a class="btn btn-outline-primary p-1" href="/admin/memberships/edit-member/{{$m->id}}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        &nbsp;
                        <form method="post" action="{{route('delete-member', ['id' => $m->id])}}">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Anda yakin?')"><i class="fa-solid fa-trash"></i> Hapus</button>
                        </form>
                    </th>
                    <td>{{$m->name}}</td>
                    <td>{{$m->email}}</td>
                    <td>{{$m->gender}}</td>
                    <td>{{($m->role->name)}}</td>
                </tr>
            @endforeach
        </table>
        {{$member->links()}}
    </div>
    </div>
@endsection
