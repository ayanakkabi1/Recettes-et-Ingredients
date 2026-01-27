@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6">
    
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
        <div>
            <h1 class="text-4xl font-black text-gray-800 tracking-tight">Mon <span class="text-pink-500">Livre</span> Ouvert</h1>
            <p class="text-pink-300 font-bold mt-1 uppercase text-[10px] tracking-[0.3em]">Toutes les étapes sur une seule page</p>
        </div>
        <a href="{{ route('recipes.create') }}" class="px-6 py-3 bg-white border-2 border-pink-200 text-pink-500 font-black rounded-2xl text-xs uppercase tracking-widest hover:bg-pink-500 hover:text-white transition-all duration-300 shadow-sm">
            + Ajouter
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-10"> {{-- Grid 2 colonnes pour laisser de la place aux infos --}}
        @forelse($recipes as $recipe)
            <div class="bg-white rounded-[3rem] shadow-xl shadow-pink-100/50 border border-white flex flex-col md:flex-row overflow-hidden transition-all duration-500 hover:shadow-2xl">
                
                {{-- Partie Gauche : Image & Catégorie --}}
                <div class="md:w-2/5 relative h-64 md:h-auto">
                    <img src="{{ $recipe->image }}" alt="{{ $recipe->name }}" class="w-full h-full object-cover">
                    <div class="absolute top-4 left-4">
                        <span class="bg-pink-500 text-white px-4 py-1.5 rounded-full text-[9px] font-black uppercase tracking-widest shadow-lg">
                            {{ $recipe->category }}
                        </span>
                    </div>
                </div>

                {{-- Partie Droite : Infos --}}
                <div class="md:w-3/5 p-8 flex flex-col">
                    <div class="flex justify-between items-start mb-4">
                        <h2 class="text-2xl font-black text-gray-800 leading-tight">{{ $recipe->name }}</h2>
                    </div>

                    <p class="text-gray-500 text-xs italic mb-6">"{{ $recipe->description }}"</p>

                    <div class="grid grid-cols-1 gap-6 flex-grow">
                        {{-- Ingrédients --}}
                        <div class="bg-pink-50/50 p-4 rounded-2xl border border-pink-100/50">
                            <h3 class="text-[10px] font-black text-pink-500 uppercase tracking-widest mb-2 flex items-center">
                                <span class="mr-2">🛒</span> Ingrédients
                            </h3>
                            <p class="text-[11px] text-gray-600 leading-relaxed">{{ $recipe->ingredients }}</p>
                        </div>

                        {{-- Étapes --}}
                        <div>
                            <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 flex items-center">
                                <span class="mr-2">🔥</span> Préparation
                            </h3>
                            <p class="text-[11px] text-gray-700 leading-relaxed line-clamp-4">{{ $recipe->steps }}</p>
                        </div>
                    </div>

                    {{-- Actions en bas --}}
                    <div class="mt-8 pt-4 border-t border-pink-50 flex justify-between items-center">
                        <div class="flex space-x-4">
                            <a href="{{ route('recipes.edit', $recipe->id) }}" class="text-[10px] font-bold text-pink-400 hover:text-pink-600 uppercase tracking-tighter transition-colors">Modifier</a>
                            <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Supprimer ?')">
                                @csrf @method('DELETE')
                                <button class="text-[10px] font-bold text-gray-300 hover:text-red-400 uppercase tracking-tighter transition-colors">Supprimer</button>
                            </form>
                        </div>
                        <span class="text-[9px] text-pink-200 font-bold uppercase tracking-widest italic">Secret Maison</span>
                    </div>
                </div>
            </div>
        @empty
            {{-- Ton code @empty ici --}}
        @endforelse
    </div>
</div>
@endsection