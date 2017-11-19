<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// List all cities in a state
Route::get('/state/{state}/cities', 'VisitsController@listCities');

//Return a list of cities the user has visited
Route::get('/user/{user}/visits','VisitsController@cityVisits');

//Return a list of states the user has visited
Route::get('/user/{user}/visits/states', 'VisitsController@stateVisits');

// Allow creating a new visit to a city
Route::post('/user/{user}/visits', 'VisitsController@create');

//Allow a user to remove a visit
Route::delete('/visit/{visit}', 'VisitsController@remove');
