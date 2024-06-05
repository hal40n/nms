@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-4">{{ $procedure->title }}</h1>
    <p class="text-gray-600 mb-4">{{ $procedure->user->name }} - {{ $procedure->created_at->format('M d, Y') }}</p>
    <div class="text-gray-800 mb-4">
        {!! nl2br(e($procedure->content)) !!}
    </div>
    <p class="text-gray-600 mb-4">Category: {{ $procedure->category->name }}</p>
    <p class="text-gray-600 mb-4">Tags:
        @foreach ($procedure->tags as $tag)
            <span class="bg-gray-200 px-2 py-1 rounded">{{ $tag->name }}</span>
        @endforeach
    </p>
    <a href="{{ route('procedures.edit', $procedure->id) }}" class="text-blue-600 hover:underline">Edit</a>

    <form action="{{ route('procedures.destroy', $procedure->id) }}" method="POST" class="inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-600 hover:underline ml-4">Delete</button>
    </form>
</div>
@endsection
