@extends('layouts.app')
@section('title', 'Agregar Producto')
@include('layouts.partials.navbar')

@section('contenido')
<div class="min-h-screen bg-linear-to-br from-gray-50 to-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <!-- Header -->
        <div class="mb-8 text-center">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-linear-to-r from-blue-500 to-indigo-600 rounded-2xl shadow-lg mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
            </div>
            <h2 class="text-3xl font-extrabold bg-linear-to-r from-gray-800 to-gray-600 dark:from-gray-200 dark:to-gray-600 bg-clip-text text-transparent">
                Agregar Nuevo Producto
            </h2>
            <p class="mt-2 text-gray-600 dark:text-gray-600">Completa la información del producto para agregarlo al inventario</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-200 dark:border-gray-700">
            <form action="{{ route('products.store') }}" method="POST" class="p-6 sm:p-8 space-y-6">
                @csrf

                <!-- Success Message -->
                @if(session('success'))
                    <div class="mb-4 bg-green-50 dark:bg-green-900/30 border-l-4 border-green-500 text-green-700 dark:text-green-400 p-4 rounded-lg" role="alert">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                <!-- Name Field -->
                <div>
                    <label for="name" class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                        Nombre del producto
                        <span class="text-red-500 ml-1">*</span>
                        <span class="ml-2 text-xs text-gray-500 dark:text-gray-400 font-normal">(Requerido)</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                               class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm 
                                      focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                      dark:bg-gray-700 dark:text-gray-100 transition-all duration-200
                                      @error('name') border-red-500 dark:border-red-500 @enderror" 
                               placeholder="Ej. Laptop HP Pavilion">
                    </div>
                    @error('name')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                            <svg class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Description Field -->
                <div>
                    <label for="description" class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                        Descripción del producto
                        <span class="ml-2 text-xs text-gray-500 dark:text-gray-400 font-normal">(Opcional)</span>
                    </label>
                    <div class="relative">
                        <textarea name="description" id="description" rows="4"
                                  class="block w-full px-3 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm 
                                         focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                         dark:bg-gray-700 dark:text-gray-100 resize-y transition-all duration-200"
                                  placeholder="Describe las características del producto...">{{ old('description') }}</textarea>
                    </div>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Máximo 500 caracteres</p>
                </div>

                <!-- Price, Stock and Category Row -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <!-- Price Field -->
                    <div>
                        <label for="price" class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Precio
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 dark:text-gray-400 font-medium">$</span>
                            </div>
                            <input type="number" step="0.01" id="price" name="price" value="{{ old('price') }}"
                                   class="block w-full pl-8 pr-3 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm 
                                          focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                          dark:bg-gray-700 dark:text-gray-100 transition-all duration-200
                                          @error('price') border-red-500 dark:border-red-500 @enderror" 
                                   placeholder="0.00">
                        </div>
                        @error('price')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Stock Field -->
                    <div>
                        <label for="stock" class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Stock
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                </svg>
                            </div>
                            <input type="number" id="stock" name="stock" value="{{ old('stock') }}"
                                   class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm 
                                          focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                          dark:bg-gray-700 dark:text-gray-100 transition-all duration-200
                                          @error('stock') border-red-500 dark:border-red-500 @enderror" 
                                   placeholder="0">
                        </div>
                        @error('stock')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category Field -->
                    <div>
                        <label for="category" class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Categoría
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <div class="relative">
                            <select name="category" id="category" 
                                    class="block w-full px-3 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm 
                                           focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                           dark:bg-gray-700 dark:text-gray-100 appearance-none cursor-pointer
                                           @error('category') border-red-500 dark:border-red-500 @enderror">
                                <option value="">Selecciona una categoría</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->Name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </div>
                        @error('category')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- Additional Info (Optional) -->
                <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-4">
                    <div class="flex items-center mb-3">
                        <svg class="h-5 w-5 text-gray-500 dark:text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Información adicional</span>
                    </div>
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                        Los campos marcados con <span class="text-red-500">*</span> son obligatorios. 
                        Asegúrate de completar toda la información requerida.
                    </p>
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row gap-3 pt-4">
                    <button type="submit" 
                            class="flex-1 flex justify-center items-center gap-2 bg-linear-to-r from-blue-600 to-indigo-600 
                                   text-white font-semibold py-2.5 px-4 rounded-lg shadow-md 
                                   hover:from-blue-700 hover:to-indigo-700 transform hover:scale-[1.02] 
                                   focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 
                                   transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Guardar Producto
                    </button>
                    
                    <a href="{{ route('index') }}" 
                       class="flex-1 flex justify-center items-center gap-2 bg-gray-100 dark:bg-gray-700 
                              text-gray-700 dark:text-gray-300 font-semibold py-2.5 px-4 rounded-lg 
                              hover:bg-gray-200 dark:hover:bg-gray-600 transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection