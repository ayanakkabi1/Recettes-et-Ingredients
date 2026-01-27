<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Livre de Recettes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">

    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-orange-600 mb-6">Mes Recettes</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($recipes as $recipe)
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-bold">{{ $recipe->name }}</h2>
                    <p class="text-gray-600 my-2">{{ $recipe->description }}</p>
                    
                    <div class="mt-4">
                        <span class="font-semibold text-sm text-gray-500 uppercase">Ingrédients :</span>
                        <p class="text-sm italic text-gray-700">{{ $recipe->ingredients }}</p>
                    </div>
                </div>
            @empty
                <div class="bg-orange-100 border-l-4 border-orange-500 p-4 w-full">
                    <p class="text-orange-700">Aucune recette pour le moment. Ajoute-en une via Tinker !</p>
                </div>
            @endforelse
        </div>
    </div>

</body>
</html>