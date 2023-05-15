<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class FilmController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $films = Film::where('title', 'LIKE', '%'.$request->search.'%')->paginate(3);
            $films->appends(['search' => $request->search]);
        } else {
            $films = Film::paginate(3);
        }
        return view('publisher/all-movies', [
            "title" => "Film Settings",
            "films" => $films
        ]);
    }

    public function create()
    {
        return view('publisher/movies/add-movies', [
            "title" => "Add Movies"
        ]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'release_date' => 'required',
            'genre' => 'required',
            'img_cover' => 'required|mimes:jpg,jpeg,png',
            'film_desc' => 'required'
        ], [
            'title.required' => 'Judul tidak boleh kosong',
            'release_date.required' => 'Isi tanggal terlebih dahulu',
            'genre.required' => 'Pilih genre minimal 1',
            'img_cover.required' => 'Cover tidak boleh kosong',
            'img_cover.mimes' => 'Cover tidak valid',
            'film_desc.required' => 'Deskripsi tidak boleh kosong'
        ]);
        $rlsDt = date('d-m-Y', strtotime($request->input('release_date')));
        $genres = implode(', ', $request->genre);
        $cover = $request->img_cover;
        $coverName = time() . "." . $cover->getClientOriginalExtension();
        $upMovie = new Film();
        $upMovie->title = $request->title;
        $upMovie->release_date = $rlsDt;
        $upMovie->genre = $genres;
        $upMovie->img_cover = $coverName;
        $upMovie->film_desc = $request->film_desc;
        $cover->move(public_path().'/img/temp', $coverName);
        $upMovie->save();

        return redirect('/publisher/film-settings')->with('success', 'Berhasil menambahkan film');
    }

    public function show()
    {
        //
    }

    public function edit($id)
    {
        $film = Film::find($id);
        return view('/publisher/movies/update-movies', [
            "title" => "Update Movies",
            "film" => $film
        ]);
    }

    public function update(Request $request, $id){
    $upMovie = [];
    if ($request->has('img_cover')) {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'release_date' => 'required',
            'genre' => 'required',
            'img_cover' => 'mimes:jpg,jpeg,png',
            'film_desc' => 'required'
        ], [
            'title.required' => 'Judul tidak boleh kosong',
            'release_date.required' => 'Isi tanggal terlebih dahulu',
            'genre.required' => 'Pilih genre minimal 1',
            'img_cover.mimes' => 'Cover tidak valid',
            'film_desc.required' => 'Deskripsi tidak boleh kosong'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors()->messages());
        }
        $movie = Film::findOrFail($id);
        if (File::exists(public_path('/img/temp/' . $movie->img_cover))) {
            unlink(public_path('/img/temp/' . $movie->img_cover));
        }
        $file = $request->file('img_cover');
        $newCover = $file->hashName();
        $file->move(public_path('img/temp/'), $newCover);
        $upMovie['title'] = $request->title;
        $upMovie['release_date'] = date('d-M-Y', strtotime($request->input('release_date')));
        $upMovie['genre'] = implode(', ', $request->genre);
        $upMovie['img_cover'] = $newCover;
        $upMovie['film_desc'] = $request->film_desc;
        $movie->update($upMovie);
    } else {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'release_date' => 'required',
            'genre' => 'required',
            'film_desc' => 'required'
        ], [
            'title' => 'Judul tidak boleh kosong',
            'release_date' => 'Isi tanggal terlebih dahulu',
            'genre' => 'Pilih genre minimal 1',
            'film_desc' => 'Deskripsi tidak boleh kosong'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors()->messages());
        }
        $movie = Film::findOrFail($id);
        $upMovie['release_date'] = date('d-m-Y', strtotime($request->input('release_date')));
        $upMovie['genre'] = implode(', ', $request->genre);
        $movie->update($upMovie);
    }
    return redirect('publisher/film-settings')->with('success', 'Berhasil mengubah film');
}

    public function destroy($id)
    {
        $delMovie = Film::findOrFail($id);
        $file = public_path('img/temp/' . $delMovie->img_cover);
        if (File::exists($file)) {
            unlink($file);
        }
        $delMovie->delete();
        return redirect('/publisher/film-settings')->with('success', 'Berhasil menghapus film');
    }
}





































        //$movie = Film::findOrFail($id);
        // if (File::exists(public_path('img/temp/' . $movie->img_cover))) {
        //     File::delete(public_path('img/temp/' . $movie->img_cover));
        // }
        // $fileExtension = $request->file('img_cover')->getClientOriginalExtension();
        // $fileName = uniqid() . '.' . $fileExtension;
        // $request->file('img_cover')->move(public_path('img/temp/'), $fileName);

    //     $awal = $ubah->img_cover;
    // if ($request->hasFile('img_cover')) {
    //     if (File::exists(public_path().'/img/temp/'.$awal)) {
    //         File::delete(public_path().'/img/temp/'.$awal);
    //         $awal = $request->img_cover->hashName();
    //         $request->img_cover->move(public_path().'/img/temp/', $awal);
    //     }
    // }
    // $request['genre'] = implode(', ', $request->genre);
    // $edit = [
    //     'title' => $request['title'],
    //     'release_date' => $request['release_date'],
    //     'genre' => $request['genre'],
    //     'img_cover' => $request['img_cover'],
    //     'film_desc' => $request['film_desc']
    // ];
    // dd($edit);
    // $ubah->update($edit);