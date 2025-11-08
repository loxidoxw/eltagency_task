<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie App</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .movie-card img {
            border-radius: 8px;
            width: 100%;
            height: 350px;
            object-fit: cover;
        }
    </style>

</head>
<body class="bg-light">


<nav class="navbar navbar-light bg-white border-bottom mb-4 px-4">
    <a class="navbar-brand fw-bold fs-4" href="{{ route('film.index') }}">
         MOVIE APP
    </a>
    @can('view', auth()->user())
        <a href="{{route('film.create')}}">{{trans('films.navigation.create_film')}}</a>
    @endcan

    <div>
        <a href="{{ LaravelLocalization::getLocalizedURL('uk') }}"
           class="{{ app()->getLocale() === 'uk' ? 'fw-bold' : '' }}">
            🇺🇦 Українська
        </a>

        <a href="{{ LaravelLocalization::getLocalizedURL('en') }}"
           class="{{ app()->getLocale() === 'en' ? 'fw-bold' : '' }}">
            🇬🇧 English
        </a>
    </div>
    @auth
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{trans('films.navigation.log_out')}}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
        @endauth

</nav>

<div class="container">
    @yield('content')
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
