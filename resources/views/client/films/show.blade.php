@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <nav class="mb-3">
            <a href="{{ route('film.index') }}" class="text-decoration-none text-secondary">
                {{ __('Movie App') }}
            </a> /
            {{ app()->getLocale() === 'uk' ? $film->title_ua : $film->title_en }}
        </nav>

        <div class="row">
            <div class="col-md-3">
                <img src="{{ asset('storage/' . $film->poster) }}"
                     class="img-fluid d-block mx-auto"
                     style="max-width: 320px"
                     alt="{{ app()->getLocale() === 'uk' ? $film->title_ua : $film->title_en }}">
            </div>

            <div class="col-md-9">
                <h1 class="fw-bold">
                    {{ app()->getLocale() === 'uk' ? $film->title_ua : $film->title_en }}
                    ({{ $film->release_year }})
                </h1>


                <p class="mt-3">
                    {{ app()->getLocale() === 'uk' ? $film->description_ua : $film->description_en }}
                </p>

                <div class="mb-3">
                    @foreach($film->tags as $tag)
                        <span class="badge bg-light text-dark border">{{ app()->getLocale() === 'uk' ? $tag->name_ua :$tag->name_en }}</span>
                    @endforeach
                </div>

                <h5>{{trans('films.roles.actors')}}</h5>
                <ul>
                    @foreach($film->people->filter(function($person) { return $person->pivot->role === 'actor'; }) as $actor)
                        <li>{{ app()->getLocale() === 'uk' ? $actor->name_ua : $actor->name_en }}</li>
                    @endforeach

                </ul>

                <h5>{{trans('films.roles.director')}}</h5>
                <ul>
                    @foreach($film->people->filter(function($person) { return $person->pivot->role === 'director'; }) as $actor)
                        <li>{{ app()->getLocale() === 'uk' ? $actor->name_ua : $actor->name_en }}</li>
                    @endforeach
                </ul>

                <h5>{{trans('films.roles.writer')}}</h5>
                <ul>
                    @foreach($film->people->filter(function($person) { return $person->pivot->role === 'writer'; }) as $actor)
                        <li>{{ app()->getLocale() === 'uk' ? $actor->name_ua : $actor->name_en }}</li>
                    @endforeach
                </ul>

                <h5>{{trans('films.roles.composer')}}</h5>
                <ul>
                    @foreach($film->people->filter(function($person) { return $person->pivot->role === 'composer'; }) as $actor)
                        <li>{{ app()->getLocale() === 'uk' ? $actor->name_ua : $actor->name_en }}</li>
                    @endforeach
                </ul>


            </div>
        </div>


        <div class="row mt-5">
            <div class="col-md-3 d-flex flex-column gap-3">
                @foreach($film->screenshots as $shot)
                    <img src="{{ asset('storage/' . $shot->path) }}" class="img-fluid rounded" alt="">
                @endforeach
            </div>


            <div class="col-md-9">
                <div class="ratio ratio-16x9">
                    <iframe
                        src="https://www.youtube.com/embed/{{ $film->trailer_id }}"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>

    </div>
@endsection
