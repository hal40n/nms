@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-4">Articles</h1>
    <ul>
        @foreach ($articles as $article)
        <li class="border-b border-gray-200 py-4">
            <a href="{{ route('articles.show', $article->id) }}" class="text-blue-600 hover:underline">
                {{ $article->title }}
            </a>
            <p class="text-gray-600">{{ $article->user->name }} - {{ $article->created_at->format('M d, Y') }}</p>
        </li>
        @endforeach
    </ul>
    <div class="mt-4">
        {{ $articles->links() }}
    </div>
</div>
@endsection
