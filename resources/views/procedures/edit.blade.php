@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-4">Edit Procedure</h1>
    <form action="{{ route('procedures.update', $procedure->id) }}" method="POST">
        @csrf
        @if(isset($procedure))
            @method('PUT')
        @endif
        <div class="mb-4">
            <label for="title" class="block text-gray-700">Title:</label>
            <input type="text" name="title" id="title" class="w-full border border-gray-300 p-2 rounded" value="{{ old('title', $procedure->title) }}">
            @error('title')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="content" class="block text-gray-700">Content:</label>
            <textarea name="content" id="content" class="w-full border border-gray-300 p-2 rounded" style="height: 500px;">{{ old('content', $procedure->content) }}</textarea>
            @error('content')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="category_id" class="block text-gray-700">Category:</label>
            <select name="category_id" id="category_id" class="w-full border border-gray-300 p-2 rounded">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $procedure->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="tags" class="block text-gray-700">Tags:</label>
            <select name="tags[]" id="tags" class="w-full border border-gray-300 p-2 rounded" multiple>
                @foreach ($tags as $tag)
                <option value="{{ $tag->id }}" {{ in_array($tag->id, $procedure->tags->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $tag->name }}</option>
                @endforeach
            </select>
            @error('tags')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
