@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-4">Procedures</h1>
    <ul>
        @foreach($procedures as $procedure)
            <li class="mb-2">
                <a href="{{ route('procedures.show', $procedure->id) }}" class="text-blue-500 text-lg">{{ $procedure->title }}</a>
                <a href="{{ route('procedures.edit', $procedure->id) }}" class="text-gray-500 ml-2">Edit</a>
                <form action="{{ route('procedures.destroy', $procedure->id) }}" method="POST" class="inline-block ml-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
    <div>
        {{ $procedures->links() }}
    </div>
</div>
@endsection
