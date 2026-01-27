<?php
namespace App\Http\Controllers;
use App\Models\Recipe;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Category;

class RecipeController extends Controller {
    public function index(){
        $recipes=Recipe::all();
        return view('recipes.index',compact('recipes'));
    }
    public function create(): View {
        $categories = Category::all();
        return view('recipes.create',compact('categories'));
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
    public function edit($id){
        $recipe=Recipe::findOrFail($id);
        return view('recipes.edit', compact('recipe'));
    }
    PUBLIC FUNCTION Update(Request$request,$id){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'steps' => 'required|string',
            'image' => 'required|string|max:255',
            'category' => 'required|string|max:255',
        ]);
        $recipe=Recipe::findOrFail($id);
        $recipe->update($validatedData);
        return redirect()->route('recipes.index')->with('success', 'Recipe updated successfully.');
    }
    public function destroy($id){
        $recipe=Recipe::findOrfail($id);
        $recipe->delete();
        return redirect()->route('recipes.index')->with('success','Recipe deleted successfully.');
    }
    public function conteur(){
        $count=Recipe::count();
        return view('home',compact('count'));
    }
}