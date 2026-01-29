<?php
namespace App\Http\Controllers;
use App\Models\Recipe;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Category;

class RecipeController extends Controller {
    public function index(Request $request){
        $recipes=Recipe::all();
        $data=Recipe::query();
        if($request->filled('category')){
            $data->where('category_id',$request->category);
        }
        if($request->filled('search')){
            $data->where('name','like','%'.$request->search.'%');
            $data->orWhere('description','like','%'.$request->search.'%');
            $data->orWhere('ingredients','like','%'.$request->search.'%');
            $data->orWhere('steps','like','%'.$request->search.'%');
        }
        $recipes=$data->get();
        $categories=Category::all();
        return view('recipes.index',compact('recipes','categories'));
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
            'category_id' => 'required|integer|exists:categories,id',
        ]);
        Recipe::create($validatedData);
        return redirect()->route('recipes.index')->with('success', 'Recipe created successfully.');
    }
    public function edit($id){
        $recipe=Recipe::findOrFail($id);
        $categories = Category::all();
        return view('recipes.edit', compact('recipe','categories'));
    }
    PUBLIC FUNCTION Update(Request$request,$id){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'steps' => 'required|string',
            'image' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
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
        $categories = Category::all();
        return view('home',compact('count','categories'));
    }
    
    
}