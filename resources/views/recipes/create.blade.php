@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-pink-50 to-rose-50 py-8 px-4">
    <div class="max-w-2xl mx-auto"> {{-- Réduit de max-w-3xl à 2xl --}}

        <div class="bg-white/90 backdrop-blur-md rounded-[2.5rem] shadow-xl shadow-pink-200/40 overflow-hidden border border-white transition-all duration-500 hover:shadow-2xl">

            {{-- Header plus compact --}}
            <div class="bg-gradient-to-r from-pink-500 to-rose-400 p-6 text-center">
                <div class="inline-block bg-white/20 p-2 rounded-2xl backdrop-blur-md mb-2">
                    <span class="text-2xl">👩‍🍳</span>
                </div>
                <h2 class="text-2xl font-black text-white tracking-tight">Nouvelle Recette</h2>
            </div>
            @if ($errors->any())
            <div class="mb-4 p-4 bg-red-50 border-l-4 border-red-400 text-red-700 rounded-r-2xl text-xs">
                <p class="font-bold uppercase mb-1">Oups ! Il y a des erreurs :</p>
                <ul class="list-disc ml-4">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @auth
            <form action="{{ route('recipes.store') }}" method="POST" class="p-6 md:p-10 space-y-5">
                @csrf

                {{-- Nom --}}
                <div class="group">
                    <label class="block text-[10px] font-black text-pink-400 uppercase tracking-widest mb-1 ml-2">Nom du délice</label>
                    <input type="text" name="name" required value="{{ old('name') }}"
                        class="w-full px-5 py-3 bg-pink-50/30 border-2 border-transparent rounded-2xl focus:border-pink-300 focus:bg-white transition-all outline-none shadow-sm text-sm"
                        placeholder="Ex: Tarte aux Fraises">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    {{-- Catégorie --}}
                    <div>
                        <label for="category_id" class="block text-[10px] font-black text-pink-400 uppercase tracking-widest mb-2">
                            Choisir un univers
                        </label>

                        <select name="category_id" id="category_id"
                            class="w-full p-4 bg-white border-2 border-pink-50 rounded-2xl focus:border-pink-500 outline-none transition-all appearance-none">

                            <option value="" disabled selected>-- Sélectionnez une catégorie --</option>

                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->emoji }} {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Image URL --}}
                    <div>
                        <label class="block text-[10px] font-black text-pink-400 uppercase tracking-widest mb-1 ml-2">Lien Image (URL)</label>
                        <input type="text" name="image" required value="{{ old('image') }}"
                            class="w-full px-5 py-3 bg-pink-50/30 border-2 border-transparent rounded-2xl focus:border-pink-300 focus:bg-white outline-none text-sm"
                            placeholder="https://...">
                    </div>
                </div>

                {{-- Description --}}
                <div>
                    <label class="block text-[10px] font-black text-pink-400 uppercase tracking-widest mb-1 ml-2">Description</label>
                    <textarea name="description" rows="2" required
                        class="w-full px-5 py-3 bg-pink-50/30 border-2 border-transparent rounded-2xl focus:border-pink-300 focus:bg-white outline-none text-sm">{{ old('description') }}</textarea>
                </div>

                {{-- Ingrédients & Étapes (Plus petit) --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-[10px] font-black text-pink-400 uppercase tracking-widest mb-1 ml-2">Ingrédients</label>
                        <textarea name="ingredients" rows="3" required
                            class="w-full px-5 py-3 bg-pink-50/30 border-2 border-transparent rounded-2xl focus:border-pink-300 focus:bg-white outline-none text-xs italic">{{ old('ingredients') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-pink-400 uppercase tracking-widest mb-1 ml-2">Préparation</label>
                        <textarea name="steps" rows="3" required
                            class="w-full px-5 py-3 bg-pink-50/30 border-2 border-transparent rounded-2xl focus:border-pink-300 focus:bg-white outline-none text-xs">{{ old('steps') }}</textarea>
                    </div>
                </div>

                {{-- Bouton moins haut --}}

                <div class="pt-4">
                    <button type="submit"
                        class="w-full py-4 bg-gradient-to-r from-pink-500 to-rose-500 text-white font-bold rounded-2xl shadow-lg shadow-pink-100 transform transition hover:scale-[1.02] active:scale-95 uppercase text-xs tracking-[0.2em] flex items-center justify-center space-x-2">
                        <span>Publier</span>
                        <span>💖</span>
                    </button>
                </div>
            </form>
            @else
            <div class="text-center p-10 bg-white rounded-3xl border-2 border-dashed border-pink-200">
                <p class="text-gray-500 mb-4">Tu dois être connecté pour partager tes recettes ! 🧑‍🍳</p>
                <a href="{{ route('login') }}" class="text-pink-500 font-bold underline">Connecte-toi ici</a>
            </div>
            @endauth
        </div>
    </div>
</div>
@endsection