@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto p-6 bg-white rounded-2xl shadow">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold">{{ __('films.create_title') }}</h1>

        </div>

        <form action="{{ route('film.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block font-medium mb-2">{{ __('films.status') }}</label>
                <select name="status" class="border rounded p-2 w-full">
                    <option value="show">{{ __('films.status_show') }}</option>
                    <option value="hide">{{ __('films.status_hide') }}</option>
                </select>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block font-medium mb-2">{{ __('films.title_ua') }}</label>
                    <input type="text" name="title_ua" class="border rounded p-2 w-full" required>
                </div>
                <div>
                    <label class="block font-medium mb-2">{{ __('films.title_en') }}</label>
                    <input type="text" name="title_en" class="border rounded p-2 w-full" required>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block font-medium mb-2">{{ __('films.description_ua') }}</label>
                    <textarea name="description_ua" class="border rounded p-2 w-full" rows="4" required></textarea>
                </div>
                <div>
                    <label class="block font-medium mb-2">{{ __('films.description_en') }}</label>
                    <textarea name="description_en" class="border rounded p-2 w-full" rows="4" required></textarea>
                </div>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-2">{{ __('films.poster') }}</label>
                <input type="file" name="poster" accept="image/*" class="border rounded p-2 w-full" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-2">{{ __('films.screenshots') }}</label>
                <input type="file" name="screenshots[]" accept="image/*" multiple class="border rounded p-2 w-full">
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-2">{{ __('films.trailer_id') }}</label>
                <input type="text" name="trailer_id" class="border rounded p-2 w-full" placeholder="dQw4w9WgXcQ">
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-2">{{ __('films.release_year') }}</label>
                <input type="number" name="release_year" class="border rounded p-2 w-full" min="1900" max="{{ date('Y') }}">
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-2">{{ __('films.tags') }}</label>
                <select name="tags[]" id="tags" multiple class="border rounded p-2 w-full">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}"
                            {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>
                            {{ app()->getLocale() === 'uk' ? $tag->name_ua : $tag->name_en }}
                        </option>
                    @endforeach
                </select>
                <small class="text-gray-500">{{ __('films.tags_hint') }}</small>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-2">{{ __('films.director') }}</label>
                <input type="text" name="directors[]" class="border rounded p-2 w-full" placeholder="Ім'я режисера">
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-2">{{ __('films.writer') }}</label>
                <input type="text" name="writers[]" class="border rounded p-2 w-full" placeholder="Ім'я сценариста">
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-2">{{ __('films.actors') }}</label>
                <div id="actors-wrapper">
                    <input type="text" name="actors[]" class="border rounded p-2 w-full mb-2" placeholder="Ім'я актора">
                </div>
                <button type="button" id="add-actor" class="bg-gray-200 px-3 py-1 rounded">+ {{ __('films.add_actor') }}</button>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-2">{{ __('films.composer') }}</label>
                <input type="text" name="composers[]" class="border rounded p-2 w-full" placeholder="Ім'я композитора">
            </div>

            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block font-medium mb-2">{{ __('films.start_at') }}</label>
                    <input type="datetime-local" name="start_at" class="border rounded p-2 w-full">
                </div>
                <div>
                    <label class="block font-medium mb-2">{{ __('films.end_at') }}</label>
                    <input type="datetime-local" name="end_at" class="border rounded p-2 w-full">
                </div>
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                {{ __('films.save') }}
            </button>
        </form>
    </div>
@endsection
