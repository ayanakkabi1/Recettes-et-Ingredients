<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pink Kitchen - Mon Livre Ouvert</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#FFF5F7] min-h-screen flex flex-col">

    <header class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-pink-100">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <span class="text-2xl">🌸</span>
                <h1 class="text-xl font-black text-gray-800 tracking-tighter uppercase">
                    Pink<span class="text-pink-500">Kitchen</span>
                </h1>
            </div>
            
            <nav class="hidden md:flex items-center space-x-8 text-[11px] font-black uppercase tracking-widest text-gray-500">
                <a href="/" class="hover:text-pink-500 transition-colors">Accueil</a>
                <a href="/recipes" class="text-pink-500 border-b-2 border-pink-500 pb-1">Mes Recettes</a>
                <a href="/contact" class="hover:text-pink-500 transition-colors">Contact</a>
            </nav>

            <a href="{{ route('recipes.create') }}" class="px-5 py-2.5 bg-pink-500 text-white text-[10px] font-black uppercase tracking-widest rounded-full shadow-lg shadow-pink-200 hover:scale-105 transition-all">
                + Nouvelle Recette
            </a>
        </div>
    </header>

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
     
    <footer class="py-10 text-center border-t border-pink-50 bg-white">
        <p class="text-[10px] font-black text-gray-300 uppercase tracking-[0.5em]">
            &copy; 2026 Pink Kitchen 
        </p>
    </footer>

</body>
</html>