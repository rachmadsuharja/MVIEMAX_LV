@extends('layouts.main')
@extends('partials.publisher-navbar')

@section('container')
    <div class="m-5 p-3 rounded" style="background-color: rgba(0,0,0, .5); box-shadow: 0px 2px 4px rgb(53, 53, 53)">
        <form action="/publisher/film-settings" method="get">
            <div class="tbHead w-100 d-flex justify-content-between align-items-center">
                <div class="input-group mb-3 mt-3 w-25 d-flex align-items-center">
                    <input type="search" name="search" value="{{request('search')}}" placeholder="What are you looking for? ..." id="searchInput" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" autofocus>
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-danger border-0 p-2 text-white" id="inputGroup-sizing-default">Search</span>
                    </div>
                </div>
                <a class="btn btn-success p-1" href="/publisher/film-settings/add-movies"><i class="fa-solid fa-circle-plus"></i> Tambah</a>
            </div>
        </form>
    <table id="table" class="table" style="color: #dddd;">
        <thead>
            <th class="bg-dark text-white" scope="col">Film Settings</th>
            <th class="bg-dark text-white" scope="col">Judul</th>
            <th class="bg-dark text-white" scope="col">Tanggal Rilis</th>
            <th class="bg-dark text-white w-25" scope="col">Genre</th>
            <th class="bg-dark text-white" scope="col">Cover</th>
            <th class="bg-dark text-white" scope="col">Deskripsi</th>
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
        @if (count($films) !== 0)
            @foreach ($films as $film)
                <tr>
                    <th class="d-flex border-0">
                        <a class="btn btn-outline-primary" href="/publisher/film-settings/update-movies/{{$film->id}}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        &nbsp;
                        <form method="post" id="deleteData" action="{{route('delete-movie', ['id' => $film->id])}}" onsubmit="confirmDelete(event)">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-danger" type="submit"><i class="fa-solid fa-trash"></i> Hapus</button>
                        </form>
                    </th>
                    <td class="border-top border-secondary">{{$film->title}}</td>
                    <td class="border-top border-secondary">{{$film->release_date}}</td>
                    <td class="border-top border-secondary">{{$film->genre}}</td>
                    <td class="border-top border-secondary"><img src="{{asset('img/temp/' . $film->img_cover)}}" width="100" alt="No Pict"></td> 
                    <td class="border-top border-secondary" style="width:20em">{{$film->film_desc}}</td>
                </tr>
            @endforeach
        @else
        <tr>
            <td class="text-center" colspan="7">Tidak ada data</td>
        </tr>
        @endif
    </table>
    {{$films->links()}}
</div>
@endsection
