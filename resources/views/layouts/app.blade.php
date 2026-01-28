<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pink Kitchen Studio 🌸</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-pink-50/50 min-h-screen">

    <nav class="sticky top-0 z-50 bg-white/70 backdrop-blur-lg border-b border-pink-100">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">

                <a href="/" class="flex items-center space-x-2 group cursor-pointer">
                    <div class="bg-gradient-to-tr from-pink-500 to-rose-400 p-2 rounded-xl shadow-lg shadow-pink-200 transition-transform group-hover:rotate-12">
                        <span class="text-xl">🍳</span>
                    </div>
                    <span class="text-xl font-black text-gray-800 tracking-tight">
                        Pink<span class="text-pink-500">Kitchen</span>
                    </span>
                </a>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="/recipes" class="text-sm font-bold text-gray-500 hover:text-pink-500 transition-colors uppercase tracking-widest">Recettes</a>
                    <a href="/categories" class="text-sm font-bold text-gray-500 hover:text-pink-500 transition-colors uppercase tracking-widest">Catégories</a>

                    @auth
                    <a href="/recipes/create" class="inline-flex items-center px-6 py-3 bg-pink-500 hover:bg-pink-600 text-white text-xs font-black uppercase tracking-[0.1em] rounded-2xl shadow-lg shadow-pink-200 transition-all transform hover:-translate-y-0.5 active:scale-95">
                        <span class="mr-2">➕</span> Créer
                    </a>

                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-sm font-bold text-rose-400 hover:text-rose-600 transition-colors uppercase tracking-widest ml-4">
                            Déconnexion
                        </button>
                    </form>
                    @endauth

                    @guest
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('login') }}" class="text-sm font-bold text-gray-500 hover:text-pink-500 transition-colors uppercase tracking-widest">
                            Connexion
                        </a>
                        <a href="{{ route('register') }}" class="px-6 py-3 bg-white border-2 border-pink-100 text-pink-500 text-xs font-black uppercase tracking-[0.1em] rounded-2xl hover:bg-pink-50 transition-all">
                            S'inscrire
                        </a>
                    </div>
                    @endguest
                </div>

                <div class="md:hidden text-pink-500">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </div>
            </div>
        </div>
    </nav>

    <main class="py-10">
        @yield('content')
    </main>

    <footer class="py-10 text-center">
        <div class="flex justify-center space-x-4 mb-4">
            <span class="text-pink-200">✿</span>
            <span class="text-pink-200">✿</span>
            <span class="text-pink-200">✿</span>
        </div>
        <p class="text-[10px] font-bold text-pink-300 uppercase tracking-[0.3em]">
            © 2026 Pink Kitchen Studio — Fait avec amour
        </p>
    </footer>

</body>

</html>