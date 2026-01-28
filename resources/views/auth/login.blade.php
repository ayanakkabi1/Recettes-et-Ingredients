@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-pink-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white p-10 rounded-[2.5rem] shadow-2xl shadow-pink-200 border-4 border-white">
        
        <div class="text-center mb-8">
            <h2 class="text-3xl font-black text-gray-800">Bon retour ! 🧁</h2>
            <p class="text-pink-400 mt-2 font-medium">Prêt(e) à cuisiner de nouvelles merveilles ?</p>
        </div>

        <form action="{{ route('login') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1 ml-2">Email</label>
                <input type="email" name="email" required 
                       class="w-full px-5 py-3 rounded-2xl border-2 border-pink-100 focus:border-pink-400 focus:ring-0 transition-all outline-none"
                       placeholder="chef@cuisine.fr">
            </div>
            
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1 ml-2">Mot de passe</label>
                <input type="password" name="password" required 
                       class="w-full px-5 py-3 rounded-2xl border-2 border-pink-100 focus:border-pink-400 focus:ring-0 transition-all outline-none"
                       placeholder="••••••••">
            </div>

            <button type="submit" 
                    class="w-full bg-gradient-to-r from-pink-500 to-rose-400 text-white font-black py-4 rounded-2xl shadow-lg shadow-pink-200 hover:scale-[1.02] active:scale-95 transition-all">
                SE CONNECTER ✨
            </button>
        </form>

        <div class="mt-8 text-center">
            <p class="text-sm text-gray-500">Pas encore de compte ? 
                <a href="{{ route('register') }}" class="text-pink-500 font-bold hover:underline">Inscris-toi ici !</a>
            </p>
        </div>
    </div>
</div>
@endsection