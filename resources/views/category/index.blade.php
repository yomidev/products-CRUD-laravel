@extends('layouts.app')
@include('layouts.partials.navbar')
@section('contenido')
    <h1>Lista de categorias</h1>
    @foreach ($category as $c)
        <p>{{$c->id}}</p>
        <p>{{$c->Name}}</p>
        <p>{{$c->Description}}</p>
        <hr>
    @endforeach
@endsection