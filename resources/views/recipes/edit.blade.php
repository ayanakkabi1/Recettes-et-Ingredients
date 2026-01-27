@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-8">
    <div class="bg-white rounded-[2.5rem] shadow-xl overflow-hidden border border-white transition-all duration-500 hover:shadow-pink-100/50">
        
        <div class="bg-gradient-to-r from-pink-400 to-rose-400 p-6 text-center text-white">
            <h2 class="text-2xl font-black">Modifier : {{ $recipe->name }}</h2>
            <p class="text-xs text-pink-100 mt-1 uppercase tracking-widest italic">Édition de votre chef-d'œuvre</p>
        </div>

        <form action="{{ route('recipes.update', $recipe->id) }}" method="POST" class="p-8 space-y-5">
            @csrf
            @method('PUT')

            {{-- Nom de la recette --}}
            <div>
                <label class="block text-[10px] font-black text-pink-400 uppercase mb-1 ml-2">Nom de la recette</label>
                <input type="text" name="name" 
                       value="{{ old('name', $recipe->name) }}" 
                       class="w-full px-5 py-3 bg-pink-50/30 border-2 border-transparent rounded-2xl focus:border-pink-300 focus:bg-white outline-none shadow-inner transition-all">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                {{-- Catégorie --}}
                <div>
                    <label class="block text-[10px] font-black text-pink-400 uppercase mb-1 ml-2">Catégorie</label>
                    <select name="category" class="w-full px-5 py-3 bg-pink-50/30 border-2 border-transparent rounded-2xl focus:border-pink-300 focus:bg-white outline-none transition-all">
                        <option value="Entrée" {{ old('category', $recipe->category) == 'Entrée' ? 'selected' : '' }}>🥗 Entrée</option>
                        <option value="Plat" {{ old('category', $recipe->category) == 'Plat' ? 'selected' : '' }}>🥘 Plat</option>
                        <option value="Dessert" {{ old('category', $recipe->category) == 'Dessert' ? 'selected' : '' }}>🍰 Dessert</option>
                        <option value="Marocaine" {{ old('category', $recipe->category) == 'Marocaine' ? 'selected' : '' }}>🇲🇦 Marocaine</option>
                    </select>
                </div>

                {{-- URL de l'image --}}
                <div>
                    <label class="block text-[10px] font-black text-pink-400 uppercase mb-1 ml-2">Lien Image (URL)</label>
                    <input type="text" name="image" 
                           value="{{ old('image', $recipe->image) }}" 
                           class="w-full px-5 py-3 bg-pink-50/30 border-2 border-transparent rounded-2xl focus:border-pink-300 focus:bg-white outline-none transition-all"
                           placeholder="https://...">
                </div>
            </div>

            {{-- Description --}}
            <div>
                <label class="block text-[10px] font-black text-pink-400 uppercase mb-1 ml-2">Description courte</label>
                <textarea name="description" rows="2" class="w-full px-5 py-3 bg-pink-50/30 border-2 border-transparent rounded-2xl focus:border-pink-300 focus:bg-white outline-none transition-all">{{ old('description', $recipe->description) }}</textarea>
            </div>

            {{-- Ingrédients & Étapes --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-[10px] font-black text-pink-400 uppercase mb-1 ml-2">Ingrédients</label>
                    <textarea name="ingredients" rows="4" class="w-full px-5 py-3 bg-pink-50/30 border-2 border-transparent rounded-2xl focus:border-pink-300 focus:bg-white outline-none text-xs italic">{{ old('ingredients', $recipe->ingredients) }}</textarea>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-pink-400 uppercase mb-1 ml-2">Étapes de préparation</label>
                    <textarea name="steps" rows="4" class="w-full px-5 py-3 bg-pink-50/30 border-2 border-transparent rounded-2xl focus:border-pink-300 focus:bg-white outline-none text-xs">{{ old('steps', $recipe->steps) }}</textarea>
                </div>
            </div>

            <div class="pt-4 flex gap-3">
                <a href="{{ route('recipes.index') }}" class="flex-1 py-4 bg-gray-100 text-gray-400 font-bold rounded-2xl text-center uppercase text-xs tracking-widest hover:bg-gray-200 transition">
                    Annuler
                </a>
                <button type="submit" class="flex-[2] py-4 bg-pink-500 text-white font-bold rounded-2xl shadow-lg shadow-pink-100 hover:scale-[1.02] active:scale-95 transition uppercase text-xs tracking-widest">
                    Sauvegarder ✨
                </button>
            </div>
        </form>
    </div>
</div>
@endsection