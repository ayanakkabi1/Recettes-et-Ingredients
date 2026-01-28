@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-pink-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white p-10 rounded-[2.5rem] shadow-2xl shadow-pink-200 border-4 border-white">
        
        <div class="text-center mb-8">
            <h2 class="text-3xl font-black text-gray-800">Rejoindre la brigade 🧑‍🍳</h2>
            <p class="text-pink-400 mt-2 font-medium">Crée ton profil de Chef en quelques secondes</p>
        </div>

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1 ml-2">Ton nom</label>
                <input type="text" name="name" required 
                       class="w-full px-5 py-3 rounded-2xl border-2 border-pink-100 focus:border-pink-400 focus:ring-0 outline-none transition-all">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1 ml-2">Email</label>
                <input type="email" name="email" required 
                       class="w-full px-5 py-3 rounded-2xl border-2 border-pink-100 focus:border-pink-400 focus:ring-0 outline-none transition-all">
            </div>
            
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1 ml-2">Mot de passe</label>
                <input type="password" name="password" required 
                       class="w-full px-5 py-3 rounded-2xl border-2 border-pink-100 focus:border-pink-400 focus:ring-0 outline-none transition-all">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1 ml-2">Confirme le mot de passe</label>
                <input type="password" name="password_confirmation" required 
                       class="w-full px-5 py-3 rounded-2xl border-2 border-pink-100 focus:border-pink-400 focus:ring-0 outline-none transition-all">
            </div>

            <button type="submit" 
                    class="w-full bg-gradient-to-r from-pink-500 to-rose-400 text-white font-black py-4 rounded-2xl shadow-lg shadow-pink-200 hover:scale-[1.02] active:scale-95 transition-all mt-4">
                CRÉER MON COMPTE 🧁
            </button>
        </form>
    </div>
</div>
@endsection