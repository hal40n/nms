@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-4">Procedures</h1>
    <ul>
        @foreach ($procedures as $procedure)
        <li class="border-b border-gray-200 py-4">
            <a href="{{ route('procedures.show', $procedure->id) }}" class="text-blue-600 hover:underline">
                {{ $procedure->title }}
            </a>
            <p class="text-gray-600">{{ $procedure->user->name }} - {{ $procedure->created_at->format('M d, Y') }}</p>
        </li>
        @endforeach
    </ul>
    <div class="mt-4">
        {{ $procedures->links() }}
    </div>
</div>
@endsection
