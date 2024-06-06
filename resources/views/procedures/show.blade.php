@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-4">{{ $procedure->title }}</h1>
    <div class="mb-4">
        <label class="block text-gray-700 font-bold">Category:</label>
        <span>{{ $procedure->category->name }}</span>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 font-bold">Content:</label>
        <div class="prose max-w-none">
            {!! $procedure->content !!}
        </div>
    </div>
    <div class="mb-6 flex">
        <div class="mr-4">
            <label class="block text-gray-700 font-bold">Tags:</label>
        </div>
        <div>
            @foreach ($procedure->tags as $tag)
                <span class="bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{ $tag->name }}</span>
            @endforeach
        </div>
    </div>
    <a href="{{ route('procedures.edit', $procedure->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded">Edit</a>
    <a href="{{ route('procedures.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded">Back</a>
</div>
@endsection
