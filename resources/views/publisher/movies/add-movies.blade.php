@extends('layouts.main')

@section('embed')
    <link rel="stylesheet" href="/css/checkbox-grid.css">
@endsection

@section('container')
    <div class="container bg-transparent w-100 h-100 p-3 d-flex justify-content-center align-items-center">
        <div class="container-fluid w-50 px-5 py-3 rounded" style="background: rgba(255,0,0, .6)">
            <div class="mb-3 d-flex justify-content-center">
                <h3 style="color: #dfdfdf;">Tambah Film</h3>
            </div>
                <form action="{{route('add-movie')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input class="form-control" type="text" name="title" value="{{old('title')}}" id="title" placeholder="Judul..." aria-label="default input example">
                        @error('title')
                            <div class="alert alert-transparent p-0 text-white-50 mt-1"><i class="fa-solid fa-circle-exclamation"></i> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="release_date" class="form-label">Tanggal Rilis</label>
                        <input class="form-control" type="date" name="release_date" value="{{old('release_date')}}" id="release_date" aria-label="default input example">
                        @error('release_date')
                            <div class="alert alert-transparent p-0 text-white-50 mt-1"><i class="fa-solid fa-circle-exclamation"></i> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="genre" class="form-label">Genre</label>
                            <div class="checkbox-container">
                                <div class="checkbox-grid">
                                    <input type="checkbox" name="genre[]" value="Action" {{ str_contains(old('genre[]'), 'Action') ? 'checked' : '' }} id="action">
                                    <label for="action">Action</label>
                                </div>
                                <div class="checkbox-grid">
                                    <input type="checkbox" name="genre[]" value="Adventure" {{ str_contains(old('genre[]'), 'Adventure') ? 'checked' : '' }} id="adventure">
                                    <label for="adventure">Adventure</label>
                                </div>
                                <div class="checkbox-grid">
                                    <input type="checkbox" name="genre[]" value="Fantasy" {{ str_contains(old('genre[]'), 'Fantasy') ? 'checked' : '' }} id="fantasy">
                                    <label for="fantasy">Fantasy</label>
                                </div>
                                <div class="checkbox-grid">
                                    <input type="checkbox" name="genre[]" value="Sci-Fi" {{ str_contains(old('genre[]'), 'Sci-Fi') ? 'checked' : '' }} id="scifi">
                                    <label for="scifi">Sci-Fi</label>
                                </div>
                                <div class="checkbox-grid">
                                    <input type="checkbox" name="genre[]" value="Comedy" {{ str_contains(old('genre[]'), 'Comedy') ? 'checked' : '' }} id="comedy">
                                    <label for="comedy">Comedy</label>
                                </div>
                                <div class="checkbox-grid">
                                    <input type="checkbox" name="genre[]" value="Romance" {{ str_contains(old('genre[]'), 'Romance') ? 'checked' : '' }} id="romance">
                                    <label for="romance">Romance</label>
                                </div>
                                <div class="checkbox-grid">
                                    <input type="checkbox" name="genre[]" value="Shounen" {{ str_contains(old('genre[]'), 'Shounen') ? 'checked' : '' }} id="shounen">
                                    <label for="shounen">Shounen</label>
                                </div>
                                <div class="checkbox-grid">
                                    <input type="checkbox" name="genre[]" value="Shoujo" {{ str_contains(old('genre[]'), 'Shoujo') ? 'checked' : '' }} id="shoujo">
                                    <label for="Shoujo">Shoujo</label>
                                </div>
                                <div class="checkbox-grid">
                                    <input type="checkbox" name="genre[]" value="Drama" {{ str_contains(old('genre[]'), 'Drama') ? 'checked' : '' }} id="drama">
                                    <label for="drama">Drama</label>
                                </div>
                                <div class="checkbox-grid">
                                    <input type="checkbox" name="genre[]" value="Mystery" {{ str_contains(old('genre[]'), 'Mystery') ? 'checked' : '' }} id="mystery">
                                    <label for="mystery">Mystery</label>
                                </div>
                                <div class="checkbox-grid">
                                    <input type="checkbox" name="genre[]" value="Thriller" {{ str_contains(old('genre[]'), 'Thriller') ? 'checked' : '' }} id="thriller">
                                    <label for="thriller">Thriller</label>
                                </div>
                                <div class="checkbox-grid">
                                    <input type="checkbox" name="genre[]" value="Horror" {{ str_contains(old('genre[]'), 'Horror') ? 'checked' : '' }} id="horror">
                                    <label for="horror">Horror</label>
                                </div>
                            </div>
                        @error('genre')
                            <div class="alert alert-transparent p-0 text-white-50 mt-1"><i class="fa-solid fa-circle-exclamation"></i> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="img_cover" class="form-label">Cover</label>
                        <input class="form-control" name="img_cover" type="file" id="img_cover">
                        @error('img_cover')
                            <div class="alert alert-transparent p-0 text-white-50 mt-1"><i class="fa-solid fa-circle-exclamation"></i> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Deskripsi..." id="film_desc" name="film_desc" style="height: 100px; resize:none;">{{old('film_desc')}}</textarea>
                        <label for="film_desc">Deskripsi</label>
                        @error('film_desc')
                            <div class="alert alert-transparent p-0 text-white-50 mt-1"><i class="fa-solid fa-circle-exclamation"></i> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex justify-content-between">
                        <a href="/publisher/film-settings" class="btn btn-secondary mt-3">Kembali</a>
                        <input type="submit" class="btn btn-success mt-3" value="Tambah">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection