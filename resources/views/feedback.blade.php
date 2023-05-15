@extends('layouts.main')

@section('navbar')
    @include('partials.navbar')
@endsection

@section('container')
    <div class="container w-50 rounded p-2" style="margin-top: 6em; background: rgba(255,0,0,.5)">
        <div id="feedback">
            <div class="container bg-transparent text-white p-0">
                <div class="container w-100 h-100 d-flex justify-content-center align-items-center" style="background: rgba(0,0,0,.5)">
                    <div class="container-fluid w-75 p-3">
                        <div class="mb-3 d-flex justify-content-center">
                            <h3>Feedback</h3>
                        </div>
                        <script>
                            function successFeed(event) {
                                Swal.fire({
                                    icon: 'success',
                                    showConfirmButton: false,
                                    title: 'Terkirim',
                                    text: 'Terima kasih telah memberikan ulasan',
                                    background: '#333',
                                    color: 'white',
                                    backdrop: 'rgba(0, 0, 0, .8)',
                                    timer: 3000,
                                    timerProgressBar: true
                                })
                            }
                        </script>
                        <form action="{{route('store-feedback')}}" id="sendFeedback" method="POST">
                            @csrf
                            <div class="mb-3 form-floating">
                                <input class="form-control h-25" style="border-radius: .5em" type="text" name="name" value="{{old('name')}}" id="nama" placeholder="nama..." aria-label="default input example">
                                <label for="nama" class="form-label text-black">Nama</label>
                                @error('name')
                                    <div class="alert alert-transparent d-flex align-items-center p-0 text-white-50"><i class="fa-solid fa-circle-exclamation p-1"></i> {{$message}} </div>
                                @enderror
                            </div>
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control h-25" style="border-radius: .5em" name="email" value="{{old('email')}}" id="email" placeholder="name@example.com">
                                <label for="email" class="form-label text-black">Email</label>
                                @error('email')
                                    <div class="alert alert-transparent d-flex align-items-center p-0 text-white-50"><i class="fa-solid fa-circle-exclamation p-1"></i> {{$message}} </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-floating mt-4">
                                    <textarea class="form-control" placeholder="Feedback" id="feedback" name="feedback" style="height: 100px">{{old('feedback')}}</textarea>
                                    <label for="feedback" class="text-dark">Feedback</label>
                                    @error('feedback')
                                        <div class="alert alert-transparent d-flex align-items-center p-0 text-white-50"><i class="fa-solid fa-circle-exclamation p-1"></i> {{$message}} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 d-flex justify-content-end">
                                <button type="submit" name="submit" id="submit" class="btn btn-danger d-flex justify-content-end">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection