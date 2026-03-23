<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Lista de categorias</h1>
    @foreach ($category as $c)
        <p>{{$c->id}}</p>
        <p>{{$c->Name}}</p>
        <p>{{$c->Description}}</p>
        <hr>
    @endforeach
</body>
</html>