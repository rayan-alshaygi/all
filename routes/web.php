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


/* Route::get('/hello', function () {
    return '<H1>Hello World <H1>';
}); */


/* Route::get('/users/{id}/{name}',function($id,$name){
    return "<h1>Hello user {$name}  with an id = {$id}";
});  */

/* Route::get('/nafisa', function () {
    return view('nafisa');
}); */

Route::get('/', 'PagesContoller@index');

Route::get('/test', 'PagesContoller@test');

Route::get('/about', 'PagesContoller@about');

Route::get('/services', 'PagesContoller@services');

/* Route::get('/about',function(){
    return view('pages.about');
}); */

