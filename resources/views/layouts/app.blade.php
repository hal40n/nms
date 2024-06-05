<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procedures Management Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto">
            <div class="flex justify-between items-center">
                <div class="text-white text-lg font-bold">
                    <a href="{{ url('/') }}">Procedure Management Portal</a>
                </div>
                <div>
                    <a href="{{ route('procedures.index') }}" class="text-gray-300 hover:text-white mr-4">Procedures</a>
                    <a href="{{ route('procedures.create') }}" class="text-gray-300 hover:text-white">Create Procedures</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-8 mb-8">
        @yield('content')
    </div>

</body>
</html>

</html>
