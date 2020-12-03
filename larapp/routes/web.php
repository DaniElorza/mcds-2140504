<?php

use Illuminate\Support\Facades\Route;
use \Carbon\Carbon;

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

Route::get('/', 'HomeController@welcome');

// Dashboard Customer
Route::put('customer/{id}', 'UserController@customerupd');
// Dashboard Editor
Route::get('editor/info', 'UserController@editorinfo');
Route::get('editor/games', 'GameController@editorgames');

/*Route::get('helloworld', function () {
    return "<h1>Hello World<h1>";
});

Route::get('users', function () {
    dd(App\User::all());
});

Route::get('user/{id}', function ($id) {
    dd(App\User::find($id));
});*/

Route::get('records', function () {
    foreach (App\User::all()->take(10) as $user) {
        $years = Carbon::createFromDate($user->birthdate)->diff()->format('%y years old');
        $since = Carbon::parse($user->created_ad);
        $rs[]  = $user->name." - ".$years." - created ".$since->diffForHumans();
    }
    return view('records', ['rs' => $rs]);
});

/*Route::get('/examples', function () {
    $users = App\User::all()->take(8);
    $categories =App\Category::all()->take(1);
    $games = App\Game::all();
    return view('examples', ['users'=>$users,'categories'=>$categories,'games'=>$games]);
});*/

Auth::routes();

Route::group(['middleware' => 'admin'], function() {
    //Resources
    Route::resources([
        'users'          => 'UserController',
        'categories'   => 'CategoryController',
        'games'        => 'GameController',
    ]);
});



// Export PDF
Route::get('generate/pdf/users', 'UserController@pdf');
Route::get('generate/pdf/games', 'GameController@pdf');

// Export Excel
Route::get('generate/excel/users', 'UserController@excel');
Route::get('generate/excel/games', 'GameController@excel');

// Import Excel
Route::post('import/excel/users', 'UserController@import');
Route::post('import/excel/games', 'GameController@import');

// Search Scope
Route::post('users/search', 'UserController@search');
Route::post('games/search', 'GameController@search');

// Middlewre
Route::get('locale/{locale}', 'LocaleController@index');

Route::get('/home', 'HomeController@index')->name('home');
