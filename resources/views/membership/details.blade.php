@extends('layouts.main')
@extends('partials.member-navbar')

@section('embed')
    <style>
        .link-bar a {
            color:rgb(204, 204, 204);
            text-decoration: none;
            font-family: 'Lato';
        }
        .link-bar a:hover {
            color: aliceblue;
            transition: .5s;
        }
        li {
            list-style: none;
            padding: .3em 0;
        }
        table tr td {
            color: white;
            padding: .3em 0;
        }
    </style>
@endsection

@section('container')
    <div class="link-bar mt-5">
        <h6 class="text-white px-4 fw-bold"><a href="/membership">Home </a>/<a href="/membership/all-movies"> Movies </a>/<a href=""> {{$movie->title}} </a></h6>
    </div>
    <div class="container bg-transparent m-0 p-0 d-flex justify-content-between">
        <div class="container w-75 d-flex m-4 p-3 rounded" style="background: rgba(66, 66, 66, 0.7)">
            <img src="/img/temp/{{$movie->img_cover}}" width="250" alt="">
            <div class="d-flex flex-column mb-2">
                <div class="mv-details mx-3 p-3 text-white" style="background: rgba(0,0,0,.5)">
                    <table class="w-75">
                        <tr>
                            <td class="fw-bold">Title:</td>
                            <td>{{$movie->title}}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Release:</td>
                            <td>{{$movie->release_date}}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Genre:</td>
                            <td>{{$movie->genre}}</td>
                        </tr>
                    </table>
                </div>
                <div class=" mx-3 p-3 text-white" style="background: rgba(0,0,0,.5)">
                    <li><b>Sinopsis:</b> </li>
                    <li>{{$movie->film_desc}}</li>
                </div>
            </div>
        </div>
        {{-- <div class="mv-list bg-dark">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">A second link item</a>
                <a href="#" class="list-group-item list-group-item-action">A third link item</a>
                <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
            </div>
        </div> --}}
    </div>
@endsection