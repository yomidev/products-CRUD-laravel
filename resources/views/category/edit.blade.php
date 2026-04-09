@extends('layouts.app')
@include('layouts.partials.navbar')
@section('contenido')
<div class="max-w-xl mx-auto mt-10 bg-white p-8 border border-gray-300 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Editar Categoria {{ $category->Name }}</h2>
    <form action="{{route('Category.update',$category->id)}} " method="POST" class="space-4">
        @csrf
        @method('PUT')
        @if(session('success'))
            <div class="p-3 bg-green-100 text-green-700 rounded-md">{{session('success')}}</div>
        @endif
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nombre de la categoria<span class="text-red-800">*</span></label>
            <input type="text" id="name" name="name" class="mt-2 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Ej. Nombre de la categoria" value= "{{$category->Name }}">
            @error('name')
                <span class="text-red-500 text-xs block mt-2 font-bold">{{$message}}</span>
            @enderror
        </div>
        <div class="mt-2">
            <label for="description" class="block text-sm font-medium text-gray-700">Descripción de la categoria</label>
            <textarea name="description" id="description" rows="6" class="mt-2 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Escribe aquí la descripción de la categoria"> {{$category->Description}}</textarea>
        </div>
       
        <div>
            <button type="submit" class="mt-5 w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Guardar Categoria</button>
        </div>
    </form>
</div>
@endsection