@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-4">Create Procedure</h1>
    <form action="{{ route('procedures.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700">Title:</label>
            <input type="text" name="title" id="title" class="w-full border border-gray-300 p-2 rounded" value="{{ old('title') }}">
            @error('title')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description:</label>
            <textarea name="description" id="description" class="w-full border border-gray-300 p-2 rounded">{{ old('description') }}</textarea>
            @error('description')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex space-x-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Create</button>
            <a href="{{ route('procedures.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded">Back to Procedures</a>
        </div>
    </form>
</div>
@endsection
