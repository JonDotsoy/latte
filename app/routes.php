<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/','homeController@showPost');
Route::get('/article/{id}','articleController@showArticle');
Route::post('/article','articleController@createArticle');
Route::post('/article/{id}','articleController@createArticle');
Route::post('/article/{id}/comment','articleController@createComment');
Route::get('/article/comment/dlt/{id}','articleController@deleteComment');
Route::get('/article/{id}/delete','articleController@deleteArticle');
Route::get('/article/{id}/edit','articleController@editArticle');
Route::get('/article/{id}/liked','articleController@likedAricle');
Route::get('/article/{id}/statusliked','articleController@getlikedAricle');

Route::get('/login','sessionController@showLogin');
Route::post('/login','sessionController@createLogin');
Route::get('/logout','sessionController@showLogout');
Route::get('/register','sessionController@showRegister');
Route::post('/register','sessionController@createRegister');
Route::get('/listUsers','usersController@listUsers');
Route::get('/users/{user}','usersController@viewUser');
Route::post('/users/{user}','usersController@editUser');

Route::get('/ads','adsController@showPanelControl');
Route::get('/ads/{id_ad}','adsController@showEditPanelControl');
Route::get('/ads/{id_ad}/del','adsController@delPanelControl');
Route::post('/ads/{id_ad}','adsController@saveEditPanelControl');

App::error(function($exception,$code){
	switch ($code) {
        case 403: return Response::view('errors.403'    , array("code" => $code), 403);
        case 404: return Response::view('errors.404'    , array("code" => $code), 404);
        case 500: return Response::view('errors.500'    , array("code" => $code), 500);
        default : return Response::view('errors.default', array("code" => $code), $code);
    }
});
