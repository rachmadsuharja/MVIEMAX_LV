@extends('layouts.main')
@extends('partials.member-navbar')

@section('embed')
    
@endsection

@section('container')
<div class="main-page mt-5 w-100 h-100 p-3">
    <div class="d-flex justify-content-between">
        <div class="m-3 d-flex">
            <h3 class="text-white" data-aos="fade-in" data-aos-duration="500" data-aos-delay="800">Hai, </h3> 
            &nbsp;
            <h3 class="text-white" data-aos="fade-in" data-aos-duration="500" data-aos-delay="800"><b>{{Auth::user()->name}}</b></h3>&nbsp;
            <img data-aos="fade-right" data-aos-duration="1000" src="https://media.giphy.com/media/hvRJCLFzcasrR4ia7z/giphy.gif" width="30" height="30"/>
        </div>
        <div class="container m-0 p-3 text-white rounded" style="background: rgba(51, 34, 51, .6); width:16em">
            <h5 class="m-0 p-0 text-center"><b>{{ $role }}</b></h5>
            <hr style="border: 1.6px solid #828282">
            <b>Features </b> <p>{{$features}}</p>
            <hr>
            <b>Limit </b> <p>{{$limit}} Bulan</p>
        </div>
    </div>
    <div class="main-content">
        <h2 class="d-flex justify-content-center text-white" style="font-family: 'Oswald">Latest Movie</h2>
    </div>
    <hr style="border: 1.5px solid #555555">
    <div class="m-3 p-1">
    <div id="all-list">
        @foreach ($latestMv as $mv)
            <div class="card-box">
                <img class="coverImg" src="{{asset('img/temp/' . $mv->img_cover)}}" width="500">
                <h1>{{$mv->title}}</h1>
                <p class="genre text-white-50">{{$mv->genre}}</p>
            </div>
        @endforeach
    </div>
    </div>
@endsection