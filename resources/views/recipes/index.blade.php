@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6">

    {{-- En-tête --}}
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
        <div>
            <h1 class="text-4xl font-black text-gray-800 tracking-tight">Mon <span class="text-pink-500">Livre</span> Ouvert</h1>
            <p class="text-pink-300 font-bold mt-1 uppercase text-[10px] tracking-[0.3em]">Toutes les étapes sur une seule page</p>
        </div>
        <a href="{{ route('recipes.create') }}" class="px-6 py-3 bg-white border-2 border-pink-200 text-pink-500 font-black rounded-2xl text-xs uppercase tracking-widest hover:bg-pink-500 hover:text-white transition-all duration-300 shadow-sm">
            + Ajouter une recette
        </a>
    </div>
    <div class="max-w-4xl mx-auto px-6 mb-12">
        <form action="{{ route('recipes.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">

            {{-- Barre de recherche --}}
            <div class="relative flex-grow">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-pink-400">🔍</span>
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Chercher une recette..."
                    class="w-full pl-12 pr-4 py-4 bg-white border-2 border-pink-50 rounded-2xl shadow-sm focus:border-pink-300 outline-none transition-all">
            </div>

            {{-- Select de catégorie --}}
            <select name="category" onchange="this.form.submit()"
                class="px-6 py-4 bg-white border-2 border-pink-50 rounded-2xl shadow-sm outline-none focus:border-pink-300 text-gray-500 cursor-pointer">
                <option value="">Toutes les catégories</option>
                @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
                @endforeach
            </select>


            <button type="submit" class="bg-pink-500 text-white px-8 py-4 rounded-2xl font-black uppercase text-[10px] tracking-widest hover:bg-pink-600 transition-all shadow-lg shadow-pink-100">
                Filtrer
            </button>
        </form>
    </div>
    @if($recipes->isEmpty())
    <div class="text-center py-20">
        <span class="text-6xl block mb-4">🥥</span>
        <h3 class="text-xl font-bold text-gray-400">Oups ! Aucune recette trouvée pour "{{ request('search') }}"</h3>
        <a href="{{ route('recipes.index') }}" class="text-pink-500 underline mt-2 inline-block">Réinitialiser les filtres</a>
    </div>
    @else
    {{-- Grille --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
        @forelse($recipes as $recipe)
        <div class="bg-white rounded-[3rem] shadow-xl shadow-pink-100/50 border border-white flex flex-col md:flex-row overflow-hidden transition-all duration-500 hover:shadow-2xl">

            {{-- Partie Gauche : Image --}}
            <div class="md:w-2/5 relative h-64 md:h-auto">
                <img src="{{ $recipe->image }}" alt="{{ $recipe->name }}" class="w-full h-full object-cover">
                <div class="absolute top-4 left-4">
                    <span class="bg-pink-500 text-white px-4 py-1.5 rounded-full text-[9px] font-black uppercase tracking-widest shadow-lg">
                        {{ $recipe->category->name ?? 'sans catégorie' }}
                    </span>
                </div>
            </div>

            {{-- Partie Droite : Infos --}}
            <div class="md:w-3/5 p-8 flex flex-col justify-between">
                <div>
                    <h2 class="text-2xl font-black text-gray-800 leading-tight mb-2">{{ $recipe->name }}</h2>
                    <p class="text-gray-500 text-xs italic mb-6">"{{ $recipe->description }}"</p>

                    <div class="space-y-4">
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
                            <p class="text-[11px] text-gray-700 leading-relaxed line-clamp-3">
                                {{ $recipe->steps }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-5 border-t border-pink-100 flex justify-between items-center">
                    {{-- Signature discrète à gauche --}}
                    <span class="text-[9px] text-pink-300 font-black uppercase tracking-[0.2em] italic">
                        ✨ Pink Kitchen
                    </span>

                    {{-- Groupe de boutons bien visibles à droite --}}
                    <div class="flex items-center space-x-3">

                        {{-- Bouton Modifier : Style Pilule Rose --}}
                        <a href="{{ route('recipes.edit', $recipe->id) }}"
                            class="flex items-center px-4 py-2 bg-pink-100 hover:bg-pink-500 text-pink-600 hover:text-white rounded-xl text-[10px] font-black uppercase tracking-widest transition-all duration-300 shadow-sm active:scale-90">
                            <span class="mr-1.5 text-xs">✍️</span> Modifier
                        </a>
                        {{-- Bouton Exporter : Style Icône --}}
                        <button onclick="window.print()"
                            class="no-print flex items-center px-4 py-2 bg-blue-50 hover:bg-blue-500 text-blue-400 hover:text-white rounded-xl text-[10px] font-black uppercase tracking-widest transition-all duration-300 active:scale-90 shadow-sm"
                            title="Exporter en PDF">
                            <span class="text-xs">📥</span>
                        </button>
                        {{-- Bouton Supprimer : Style Discret mais efficace --}}
                        <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette merveille ? 🌸')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="flex items-center px-4 py-2 bg-rose-50 hover:bg-rose-500 text-rose-300 hover:text-white rounded-xl text-[10px] font-black uppercase tracking-widest transition-all duration-300 active:scale-90">
                                <span class="mr-1.5 text-xs">🗑️</span>
                            </button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-20 bg-pink-50 rounded-[3rem] border-2 border-dashed border-pink-200">
            <p class="text-pink-400 font-bold italic">Votre carnet est vide pour le moment... 🌸</p>
        </div>
        @endforelse
    </div>
    @endif
</div>
@endsection