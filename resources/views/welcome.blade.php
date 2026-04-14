@extends('layouts.app')
@section('title', 'Producto de Prueba')
@include('layouts.partials.navbar')

@section('contenido')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-8">
        <h1 class="text-3xl font-bold bg-linear-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent dark:from-gray-200 dark:to-gray-400">
            📦 Lista de Productos
        </h1>
        <a href="{{ route('products.create') }}" 
           class="inline-flex items-center gap-2 bg-linear-to-r from-indigo-500 to-indigo-600 text-white px-5 py-2.5 rounded-lg hover:from-indigo-600 hover:to-indigo-700 transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-105">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Agregar Producto
        </a>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="mb-6 bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-sm" role="alert">
            <div class="flex items-center">
                <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-sm" role="alert">
            <div class="flex items-center">
                <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                {{ session('error') }}
            </div>
        </div>
    @endif

    <!-- Products Table -->
    <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow-xl rounded-xl border border-gray-200 dark:border-gray-700">
        <table class="min-w-full text-left">
            <thead class="bg-linear-to-r from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-800 border-b-2 border-gray-200 dark:border-gray-600">
                <tr>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Descripción</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Categoría</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Precio</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Stock</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @forelse($products as $product)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-all duration-200">
                    <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-gray-100">#{{ $product->id }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-linear-to-br from-indigo-100 to-indigo-200 dark:from-indigo-900 dark:to-indigo-800 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-indigo-600 dark:text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                            <span class="font-medium text-gray-900 dark:text-gray-100">{{ $product->name }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400 max-w-xs truncate" title="{{ $product->description }}">
                        {{ Str::limit($product->description, 50) }}
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                            {{ $product->category->Name }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="font-semibold text-green-600 dark:text-green-400">${{ number_format($product->price, 2) }}</span>
                    </td>
                    <td class="px-6 py-4">
                        @if($product->stock > 10)
                            <span class="inline-flex items-center gap-1 text-green-600 dark:text-green-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ $product->stock }}
                            </span>
                        @elseif($product->stock > 0)
                            <span class="inline-flex items-center gap-1 text-yellow-600 dark:text-yellow-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ $product->stock }}
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 text-red-600 dark:text-red-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Agotado
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center gap-2">
                            <!-- View Button -->
                            <a href="{{ route('product.details', $product->id) }}" 
                               class="p-2 text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 transition-colors duration-200" 
                               title="Ver detalles">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </a>
                            <a href="{{ route('product.edit', $product->id) }}" 
                               class="p-2 text-amber-600 hover:text-amber-800 dark:text-amber-400 dark:hover:text-amber-300 transition-colors duration-200" 
                               title="Editar producto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg>
                            </a>
                            <button onclick="confirmDelete({{ $product->id }})"
                                    class="p-2 text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 transition-colors duration-200" 
                                    title="Eliminar producto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                            <form action="{{ route('product.delete', $product->id) }}" method="POST" id="delete-product-{{ $product->id }}">
                                @csrf
                                @method('DELETE')
                            </form>
                            
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center gap-3">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                            <p class="text-gray-500 dark:text-gray-400 text-lg">No hay productos registrados</p>
                            <a href="{{ route('products.create') }}" class="inline-flex items-center gap-2 text-indigo-600 hover:text-indigo-700 font-medium">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                Agregar el primer producto
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<script>
    function confirmDelete(id){
        Swal.fire({
            title: "Eliminar",
            text: "Estas seguro de eliminar el producto?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '3085d6',
            confirmButtonText: 'Si, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if(result.isConfirmed){
                document.getElementById('delete-product-'+id).submit();
            }
        });
    }
</script>
<style>
    /* Smooth transitions */
    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 200ms;
    }
</style>
@endsection