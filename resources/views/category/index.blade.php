@extends('layouts.app')
@include('layouts.partials.navbar')
@section('contenido')
<div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Lista Categorias</h1>
        <a href="{{ route('category.create') }}" class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-700">+ Agregar Categoria</a>
    </div>

    @if(session('success'))
            <div class="p-3 bg-green-100 text-green-700 rounded-md">{{session('success')}}</div>
        @endif
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full text-left text-gray-600">
            <thead class="bg-gray-100 uppercase text-gray-700 p-5">
                <tr>
                    <th class="px-6 py-3 w-10">ID</th>
                    <th class="px-6 py-3 w-100">Nombre</th>
                    <th class="px-6 py-3 w-1/3">Descripción</th>
                    <th class="px-6 py-3">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category as $category)
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="px-6 py-4">{{$category->id}}</td>
                    <td class="px-6 py-4">{{$category->Name}}</td>
                    <td class="px-6 py-4">{{$category->description}}</td>
                    <td class="px-6 py-4">
                        <a href="" class="inline-block bg-green-800 text-white p-3 rounded-xl text-center font-semibold cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection 