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
            <label for="editor_mode" class="block text-gray-700">Editor Mode:</label>
            <button type="button" id="richEditorBtn" class="bg-blue-600 text-white px-4 py-2 rounded">Rich Editor</button>
            <button type="button" id="markdownEditorBtn" class="bg-gray-600 text-white px-4 py-2 rounded">Markdown Editor</button>
        </div>
        <div class="mb-4">
            <label for="content" class="block text-gray-700">Content:</label>
            <textarea name="content" id="content" class="w-full border border-gray-300 p-2 rounded">{{ old('content') }}</textarea>
            @error('content')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="category_id" class="block text-gray-700">Category:</label>
            <select name="category_id" id="category_id" class="w-full border border-gray-300 p-2 rounded">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
            @error('tags')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Create</button>
    </form>
</div>

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/tinymce@5/tinymce.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simplemde@latest/dist/simplemde.min.js"></script>
<script>
    let editorMode = 'rich'; // Default editor mode
    let simplemde;

    document.getElementById('richEditorBtn').addEventListener('click', function() {
        if (editorMode === 'markdown') {
            simplemde.toTextArea();
            simplemde = null;
            initRichEditor();
            editorMode = 'rich';
        }
    });

    document.getElementById('markdownEditorBtn').addEventListener('click', function() {
        if (editorMode === 'rich') {
            tinymce.remove();
            initMarkdownEditor();
            editorMode = 'markdown';
        }
    });

    function initRichEditor() {
        tinymce.init({
            selector: '#content',
            height: 400,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | bold italic backcolor | \
                      alignleft aligncenter alignright alignjustify | \
                      bullist numlist outdent indent | removeformat | help'
        });
    }

    function initMarkdownEditor() {
        simplemde = new SimpleMDE({ element: document.getElementById('content') });
    }

    document.addEventListener('DOMContentLoaded', function() {
        initRichEditor(); // Initialize rich editor by default
    });
</script>
@endsection
@endsection
