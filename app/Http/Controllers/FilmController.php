<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilmRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Film;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class FilmController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $films = Film::paginate(8);
        return view('client.films.index', compact('films'));
    }

    public function show(Film $film)
    {
        $film->load(['screenshots', 'tags', 'people']);
       return view('client.films.show', compact('film'));
    }

    public function create()
    {
        if (! auth()->user() === 'admin') {
            return redirect()->route('film.index')->with('error', 'You are not admin');
        }
        $tags = Tag::all();

        return view('client.films.create', compact('tags'));
    }

    public function store(FilmRequest $request)
    {
       $data = $request->validated();
       Film::create($data);
       return redirect()->route('film.index');
    }

    public function edit()
    {
        return view('client.edit');
    }

    public function update(ProfileUpdateRequest $request, Film $film)
    {
      $data = $request->validated();
      $film->update($data);
      return redirect()->route('film.index');
    }

    public function destroy(Film $film)
    {
        $film->delete();

        return redirect()->route('film.index');
    }
}
