@extends('layouts.app')
    @section('content')
    <body class="bg-[#FFF5F7] min-h-screen flex flex-col">
    <main class="flex-grow flex items-center justify-center py-20 px-6">
        <div class="text-center space-y-6">
            <div class="inline-block px-4 py-1.5 bg-pink-100 text-pink-500 rounded-full text-[10px] font-black uppercase tracking-[0.3em] mb-4">
                Le secret est dans l'amour ✨
            </div>
            <h2 class="text-6xl md:text-8xl font-black text-gray-800 tracking-tight leading-none">
                Bienvenue dans <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-rose-400">
                    votre cuisine.
                </span>
            </h2>
            <p class="text-gray-400 font-medium text-lg max-w-xl mx-auto">
                Organisez vos meilleures recettes dans un carnet digital aussi beau que vos plats.
            </p>
            <div class="mt-12 flex justify-center">
    <div class="bg-white/60 backdrop-blur-sm border border-white p-2 rounded-[2.5rem] shadow-xl shadow-pink-100/50">
        <div class="flex items-center space-x-4 px-8 py-4 bg-white rounded-[2rem] border border-pink-50">
            {{-- Icône animée --}}
            <div class="relative flex items-center justify-center">
                <div class="absolute inset-0 bg-pink-200 blur-lg opacity-40 animate-pulse"></div>
                <span class="relative text-3xl">👨‍🍳</span>
            </div>
            
            {{-- Texte et Compteur --}}
            <div class="text-left">
                <span class="block text-[10px] font-black text-pink-300 uppercase tracking-[0.2em] leading-none">
                    Recettes au compteur
                </span>
                <span class="text-4xl font-black text-gray-800 tabular-nums">
                    {{$count}}
                </span>
            </div>
        </div>
    </div>
</div>
            <div class="pt-10">
                <a href="/recipes" class="px-10 py-5 bg-white border-2 border-pink-200 text-pink-500 font-black rounded-[2rem] text-xs uppercase tracking-widest hover:bg-pink-500 hover:text-white hover:border-pink-500 transition-all shadow-xl shadow-pink-100">
                    Ouvrir le livre 📖
                </a>
            </div>
        </div>
    </main>
    @endsection
