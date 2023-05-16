@extends('layouts.main')
@extends('partials.member-navbar')

@section('container')
<div class="m-5 p-3 rounded" style="background-color: rgba(0,0,0, .5); box-shadow: 0px 2px 4px rgb(53, 53, 53)">
    <form action="/membership/all-movies" method="get">
        <div class="tbHead w-100 d-flex justify-content-between align-items-center">
            <div class="input-group mb-3 mt-3 w-25 d-flex align-items-center">
                <input type="search" name="search" value="{{request('search')}}" placeholder="What are you looking for? ..." id="searchInput" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" autofocus>
                <div class="input-group-prepend">
                    <span class="input-group-text bg-danger border-0 p-2 text-white" id="inputGroup-sizing-default">Search</span>
                </div>
            </div>
        </div>
    </form>
    <table id="table" class="table" style="color: #dddd;">
        <thead>
            <th class="bg-dark text-white" scope="col">Judul</th>
            <th class="bg-dark text-white" scope="col">Tanggal Rilis</th>
            <th class="bg-dark text-white" scope="col">Genre</th>
            <th class="bg-dark text-white" scope="col"></th>
        </thead>
        @foreach ($films as $film)
            <tr>
                <td class="border-secondary">{{$film->title}}</td>
                <td class="border-secondary">{{$film->release_date}}</td>
                <td class="border-secondary">{{$film->genre}}</td>
                <td class="border-secondary text-end"><a href="/membership/movie-details/{{$film->title}}" class="btn btn-outline-primary py-1"><i class="fa-solid fa-circle-info"></i> Detail</a></td>
            </tr>
        @endforeach
    </table>
    {{$films->links()}}
</div>
@endsection