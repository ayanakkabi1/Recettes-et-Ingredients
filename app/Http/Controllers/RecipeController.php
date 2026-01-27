<?php
namespace App\Http\Controllers;
use App\Models\Recipe;
use Illuminate\View\View;
use Illuminate\Http\Request;

class RecipeController extends Controller {
    public function index(){
        $recipes=Recipe::all();
        return view('recipes.index',compact('recipes'));
    }
    public function create(): View {
        return view('recipes.create');
    }
    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'steps' => 'required|string',
            'image' => 'required|string|max:255',
            'category' => 'required|string|max:255',
        ]);
        Recipe::create($validatedData);
        return redirect()->route('recipes.index')->with('success', 'Recipe created successfully.');
    }
}