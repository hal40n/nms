<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procedures Management Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@tailwindcss/typography/dist/typography.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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

    <script src="https://cdn.jsdelivr.net/npm/tinymce@5/tinymce.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/i18n/ja.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            tinymce.init({
                selector: '#content',
                height: 500,
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | bold italic backcolor | \
                          alignleft aligncenter alignright alignjustify | \
                          bullist numlist outdent indent | removeformat | help',
                setup: function (editor) {
                    editor.on('change', function () {
                        editor.save();
                    });
                }
            });

            $('#tags').select2({
                tags: true,
                tokenSeparators: [',', ' '],
                language: 'ja'
            });
        });
    </script>
</body>
</html>
