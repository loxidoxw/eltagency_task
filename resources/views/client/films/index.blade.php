@extends('layouts.app')

@section('content')
    <div class="row g-4">
        @foreach($films as $film)
            <div class="col-6 col-md-3">
                <div class="movie-card">
                    <a href="{{ route('film.show', $film->id) }}">
                       <img src="{{ asset('storage/' . $film->poster) }}" alt="{{ app()->getLocale() === 'uk' ? $film->title_ua : $film->title_en }}">
                        <h6 class="mt-2 fw-bold">{{ app()->getLocale() === 'uk' ? $film->title_ua : $film->title_en }}</h6>
                        <small>{{ $film->release_year }}</small>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $films->links() }}
    </div>

@endsection
