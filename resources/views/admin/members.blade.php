@extends('layouts.main')

@section('embed')
    <link rel="stylesheet" href="/css/checkbox-grid.css">
@endsection

@section('navbar')
    @include('partials.admin-navbar')
@endsection

@section('container')
    <div class="m-5 p-3 rounded" style="background-color: rgba(0,0,0, .5); box-shadow: 0px 2px 4px rgb(53, 53, 53)">
        <form action="/admin/memberships" method="get">
            <div class="tbHead w-100 d-flex justify-content-between align-items-center">
                <div class="input-group mb-3 mt-3 w-25 d-flex align-items-center">
                    <input type="search" name="search" value="{{request('search')}}" placeholder="What are you looking for? ..." id="searchInput" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" autofocus>
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-danger border-0 p-2 text-white" id="inputGroup-sizing-default">Search</span>
                    </div>
                </div>
                <a class="btn btn-primary p-1" href="/admin/memberships/add-member"><i class="fa-solid fa-circle-plus"></i> Tambah Member</a>
            </div>
        </form>
        <table id="table" class="table" style="color: #dddd;">
            <thead>
                <th class="bg-dark text-white" scope="col">Member Settings</th>
                <th class="bg-dark text-white" scope="col">Name</th>
                <th class="bg-dark text-white" scope="col">Email</th>
                <th class="bg-dark text-white" scope="col">Gender</th>
                <th class="bg-dark text-white" scope="col">Role</th>
            </thead>
            <script>
                function confirmDelete(event) {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Hapus?',
                        text: "Data tidak dapat dikembalikan!",
                        icon: 'warning',
                        background: '#333',
                        color: 'white',
                        backdrop: 'rgba(0, 0, 0, .8)',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Hapus',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('deleteData').submit();
                        }
                    })
                }
            </script>
            @if (count($member) !== 0)
                @foreach ($member as $m )
                    <tr>
                        <th class="d-flex border-secondary">
                            <a class="btn btn-outline-primary p-1" href="/admin/memberships/edit-member/{{$m->id}}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                            &nbsp;
                            <form method="post" id="deleteData" action="{{route('delete-member', ['id' => $m->id])}}" onsubmit="confirmDelete(event)">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger" type="submit"><i class="fa-solid fa-trash"></i> Hapus</button>
                            </form>
                        </th>
                        <td class="border-secondary">{{$m->name}}</td>
                        <td class="border-secondary">{{$m->email}}</td>
                        <td class="border-secondary">{{$m->gender}}</td>
                        <td class="border-secondary">{{($m->role->name)}}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Tidak ada data</td>
                </tr>
            @endif
        </table>
        {{$member->links()}}
    </div>
    </div>
@endsection
