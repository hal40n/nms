@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-4">{{ isset($page) ? 'Edit Page' : 'Create Page' }}</h1>
    <form action="{{ isset($page) ? route('procedures.pages.update', [$procedure->id, $page->id]) : route('procedures.pages.store', $procedure->id) }}" method="POST">
        @csrf
        @if(isset($page))
            @method('PUT')
        @endif
        <div class="mb-4">
            <label for="title" class="block text-gray-700">Title:</label>
            <input type="text" name="title" id="title" class="w-full border border-gray-300 p-2 rounded" value="{{ old('title', isset($page) ? $page->title : '') }}">
            @error('title')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="content" class="block text-gray-700">Content:</label>
            <textarea name="content" id="content" class="w-full border border-gray-300 p-2 rounded" style="height: 500px;">{{ old('content', isset($page) ? $page->content : '') }}</textarea>
            @error('content')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex space-x-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">{{ isset($page) ? 'Update' : 'Create' }}</button>
            <a href="{{ route('procedures.show', $procedure->id) }}" class="bg-gray-600 text-white px-4 py-2 rounded">Back to Procedure</a>
        </div>
    </form>
</div>
@endsection
