<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    @vite(['resources/css/app.css', 'resource/js/app.js'])
</head>
<body>
    <main class="container mx-auto mt-6 px-4">
        @yield('contenido')
    </main>
</body>
</html>