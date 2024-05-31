@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-4">{{ $article->title }}</h1>
    <p class="text-gray-600 mb-4">{{ $article->user->name }} - {{ $article->created_at->format('M d, Y') }}</p>
    <div class="text-gray-800 mb-4">
        {{ $article->content }}
    </div>
    <a href="{{ route('articles.edit', $article->id) }}" class="text-blue-600 hover:underline">Edit</a>

    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-600 hover:underline ml-4">Delete</button>
    </form>
</div>
@endsection
