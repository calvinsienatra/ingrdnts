<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Recipe;
use App\Ingredients;

Route::get('/', function () {
		$ingrs = Ingredients::all();
		$data = [
			'ingrs' => $ingrs
		];
    return view('main', $data);
});

Route::post('/find', function() {
	$ingr = request()->only(['ingr_list']);
	dd($ingr);
});

//Route::get('/find', 'RecipeController@find');
