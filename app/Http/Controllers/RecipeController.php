<?php
namespace App\Http\Controllers;
use App\Models\Recipe;
use Illuminate\View\View;
class RecipeController extends Controller {
    public function index(){
        $recipes=Recipe::all();
        return view('recipes.index',compact('recipes'));
    }
}