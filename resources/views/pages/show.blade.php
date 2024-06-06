@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-4">{{ $page->title }}</h1>
    <div class="prose max-w-none mb-4">
        {!! $page->content !!}
    </div>
    <a href="{{ route('procedures.pages.edit', [$procedure->id, $page->id]) }}" class="bg-blue-600 text-white px-4 py-2 rounded mt-4">Edit Page</a>
    <a href="{{ route('procedures.pages.index', $procedure->id) }}" class="bg-gray-600 text-white px-4 py-2 rounded mt-4">Back to Pages</a>
</div>
@endsection
