@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-4">{{ $procedure->title }} - Pages</h1>
    <ul class="mb-4">
        @foreach($pages as $page)
            <li class="mb-2">
                <a href="{{ route('procedures.pages.show', [$procedure->id, $page->id]) }}" class="text-blue-500">{{ $page->title }}</a>
                <a href="{{ route('procedures.pages.edit', [$procedure->id, $page->id]) }}" class="text-gray-500 ml-2">Edit</a>
                <form action="{{ route('procedures.pages.destroy', [$procedure->id, $page->id]) }}" method="POST" class="inline-block ml-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('procedures.pages.create', $procedure->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4">Create Page</a>
    <a href="{{ route('procedures.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded mt-4">Back to Procedures</a>
</div>
@endsection
