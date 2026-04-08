@extends('layouts.app')
@include('layouts.partials.navbar')

@section('contenido')
<div class="min-h-screen bg-linear-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto">
        <!-- Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-300 dark:hover:text-blue-400 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                        </svg>
                        Productos
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:ml-2">Detalles del Producto</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Product Details Card -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-200 dark:border-gray-700">
            <!-- Header with actions -->
            <div class="bg-linear-to-r from-blue-600 to-indigo-600 px-6 py-4 sm:px-8 sm:py-6">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <div class="bg-white/20 backdrop-blur-sm p-2 rounded-xl">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white">{{ $product->name }}</h1>
                            <p class="text-blue-100 text-sm mt-1">ID: #{{ $product->id }}</p>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <a href="" 
                           class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 backdrop-blur-sm text-white rounded-lg hover:bg-white/30 transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                            </svg>
                            Editar
                        </a>
                        <button onclick="confirmDelete({{ $product->id }}, '{{ addslashes($product->name) }}')"
                                class="inline-flex items-center gap-2 px-4 py-2 bg-red-600/80 text-white rounded-lg hover:bg-red-700 transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Eliminar
                        </a>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6 sm:p-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Main Information -->
                    <div class="lg:col-span-2 space-y-6">
                        <!-- Description -->
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-6">
                            <div class="flex items-center gap-2 mb-4">
                                <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                                </svg>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Descripción</h3>
                            </div>
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                                {{ $product->description ?: 'No se ha proporcionado una descripción para este producto.' }}
                            </p>
                        </div>

                        <!-- Additional Details -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <!-- Creation Date -->
                            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-4">
                                <div class="flex items-center gap-2 mb-2">
                                    <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Fecha de creación</span>
                                </div>
                                <p class="text-gray-900 dark:text-white font-medium">
                                    {{ $product->created_at ? $product->created_at->format('d/m/Y H:i') : 'No disponible' }}
                                </p>
                            </div>

                            <!-- Last Update -->
                            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-4">
                                <div class="flex items-center gap-2 mb-2">
                                    <svg class="w-4 h-4 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                    <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Última actualización</span>
                                </div>
                                <p class="text-gray-900 dark:text-white font-medium">
                                    {{ $product->updated_at ? $product->updated_at->format('d/m/Y H:i') : 'No disponible' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Information -->
                    <div class="space-y-6">
                        <!-- Price Card -->
                        <div class="bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 rounded-xl p-6 border border-green-200 dark:border-green-800">
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-sm font-medium text-green-700 dark:text-green-300">Precio</span>
                                <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <p class="text-3xl font-bold text-green-600 dark:text-green-400">
                                ${{ number_format($product->price, 2) }}
                            </p>
                            <p class="text-xs text-green-600 dark:text-green-400 mt-2">Precio unitario</p>
                        </div>

                        <!-- Stock Card -->
                        <div class="rounded-xl p-6 border 
                            @if($product->stock > 10)
                                bg-blue-50 dark:bg-blue-900/20 border-blue-200 dark:border-blue-800
                            @elseif($product->stock > 0)
                                bg-yellow-50 dark:bg-yellow-900/20 border-yellow-200 dark:border-yellow-800
                            @else
                                bg-red-50 dark:bg-red-900/20 border-red-200 dark:border-red-800
                            @endif">
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-sm font-medium 
                                    @if($product->stock > 10) text-blue-700 dark:text-blue-300
                                    @elseif($product->stock > 0) text-yellow-700 dark:text-yellow-300
                                    @else text-red-700 dark:text-red-300
                                    @endif">
                                    Stock disponible
                                </span>
                                <svg class="w-6 h-6 
                                    @if($product->stock > 10) text-blue-600 dark:text-blue-400
                                    @elseif($product->stock > 0) text-yellow-600 dark:text-yellow-400
                                    @else text-red-600 dark:text-red-400
                                    @endif" 
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                </svg>
                            </div>
                            <p class="text-3xl font-bold 
                                @if($product->stock > 10) text-blue-600 dark:text-blue-400
                                @elseif($product->stock > 0) text-yellow-600 dark:text-yellow-400
                                @else text-red-600 dark:text-red-400
                                @endif">
                                {{ $product->stock }}
                            </p>
                            <p class="text-xs mt-2 
                                @if($product->stock > 10) text-blue-600 dark:text-blue-400
                                @elseif($product->stock > 0) text-yellow-600 dark:text-yellow-400
                                @else text-red-600 dark:text-red-400
                                @endif">
                                @if($product->stock > 10)
                                    ✓ Stock alto
                                @elseif($product->stock > 0)
                                    ⚠ Stock bajo
                                @else
                                    ✗ Agotado
                                @endif
                            </p>
                        </div>

                        <!-- Category Card -->
                        <div class="bg-purple-50 dark:bg-purple-900/20 rounded-xl p-6 border border-purple-200 dark:border-purple-800">
                            <div class="flex items-center gap-2 mb-3">
                                <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l5 5a2 2 0 01.586 1.414V19a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z"/>
                                </svg>
                                <span class="text-sm font-medium text-purple-700 dark:text-purple-300">Categoría</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-lg font-semibold text-purple-600 dark:text-purple-400">
                                    {{ $product->category->Name }}
                                </p>
                                <span class="px-2 py-1 bg-purple-200 dark:bg-purple-800 text-purple-700 dark:text-purple-300 text-xs rounded-full">
                                    ID: {{ $product->category->id }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700 flex flex-col sm:flex-row gap-3 justify-end">
                    <a href="{{ route('index') }}" 
                       class="inline-flex items-center justify-center gap-2 px-6 py-2.5 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-all duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Volver al listado
                    </a>
                    <a href="" 
                       class="inline-flex items-center justify-center gap-2 px-6 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                        </svg>
                        Editar producto
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection