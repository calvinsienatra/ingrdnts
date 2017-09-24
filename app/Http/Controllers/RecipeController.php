<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RecipeController extends Controller
{
    public function recipe(){
        return view('recipe');
    }

    public function find()
    {
        //User-listed Ingredients
        $ingr = request()->only(['ingr_list']);

        //Flatten array
        if (!is_array($ingr)) { 
            return FALSE; 
        } 
        $ingr_new = array(); 
        foreach ($ingr as $key => $value) { 
            if (is_array($value)) { 
                $ingr_new = array_merge($ingr_new, array_flatten($value)); 
            } else { 
                $ingr_new[$key] = $value; 
            } 
        } 

        //Get all recipes
        $recipes = Recipe::all();
        $ingr_need = [];

        //Declaring an initial array for eligible recipes
        $recipes_array = [];

        //Check if the recipe is eligible
        foreach($recipes as $recipe){
            $new = [];
            $ingr_need = $recipe->ingr_list_id;

            

            //Decode array
            foreach (json_decode($ingr_need) as $value) 
            $new[] = $value;

            //Flatten array
            if (!is_array($new)) { 
                return FALSE; 
            } 
            $new_new = array(); 
            foreach ($new as $key => $value) { 
                if (is_array($value)) { 
                    $new_new = array_merge($new_new, array_flatten($value)); 
                } else { 
                    $new_new[$key] = $value; 
                } 
            } 

            //Find array difference
            $containsSearch = array_diff($new_new, $ingr_new);

            //If true then eligible, vice versa
            if($containsSearch == null){
                array_push($recipes_array, $recipe->food_id);
            }
        }
        if(!empty($recipes_array)){
            $final_recipes = Recipe::where('food_id', $recipes_array)->get();
        }else{
            $final_recipes = null;
        }
        $data = [
            'recipes_array' => $recipes_array,
            'final_recipes' => $final_recipes
        ];

        return response()->json(['success' => true, 'data'=>$recipes_array, 'final'=>$final_recipes, 'html'=> view('recipe', $data)->render()]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
