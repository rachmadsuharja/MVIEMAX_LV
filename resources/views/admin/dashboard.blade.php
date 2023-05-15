@extends('layouts.main')

@section('embed')
    <link rel="stylesheet" href="/css/card.css">
@endsection

@section('navbar')
    @include('partials.admin-navbar')
@endsection

@section('container')
<div class="main-content">
    <div class="greetings mt-5 m-3">
        <h3 class="text-white d-flex"><b>WELCOME | </b> <p data-aos="fade-right">{{Auth::user()->name}}</p></h3>
    </div>
    <hr style="border: 1.5px solid #555555">
    <div class="container mt-5 bg-transparent">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-blue order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Membership</h6>
                        <hr/>
                        <div class="container bg-transparent d-flex justify-content-between align-items-center">
                            <h1>{{count($memberAmount)}}</h1>
                            <i class="fa-solid fa-user-group"></i>
                        </div>
                        <div class="container bg-transparent mt-2"><a class="text-white text-decoration-none" href="/admin/memberships">Detail <i class="fa-solid fa-arrow-up-right-from-square text-white" style="font-size: 1em;"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-green order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Publisher</h6>
                        <hr>
                        <div class="container bg-transparent d-flex justify-content-between align-items-center">
                            <h1>{{count($publisherAmount)}}</h1>
                            <i class="fa-solid fa-user-group"></i>
                        </div>
                        <div class="container bg-transparent mt-2"><a class="text-white text-decoration-none" href="/admin/publishers">Detail <i class="fa-solid fa-arrow-up-right-from-square text-white" style="font-size: 1em;"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-yellow order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Movie</h6>
                        <hr>
                        <div class="container bg-transparent d-flex justify-content-between align-items-center">
                            <h1>{{count($filmAmount)}}</h1>
                            <i class="fa-solid fa-film"></i>
                        </div>
                        <div class="container bg-transparent mt-2"><a class="text-white text-decoration-none" href="/admin/all-movies">Detail <i class="fa-solid fa-arrow-up-right-from-square text-white" style="font-size: 1em;"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-red order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Role</h6>
                        <hr>
                        <div class="container bg-transparent d-flex justify-content-between align-items-center">
                            <h1>{{count($roleAmount)}}</h1>
                            <i class="fa-solid fa-user-gear"></i>
                        </div>
                        <div class="container bg-transparent mt-2"><a class="text-white text-decoration-none" href="/admin/roles">Detail <i class="fa-solid fa-arrow-up-right-from-square text-white" style="font-size: 1em;"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr style="border: 1.5px solid #555555">
<div class="container bg-transparent">
    <a href="/" target="_blank" class="btn btn-danger">Halaman Utama</a>
</div>
</div>
@endsection