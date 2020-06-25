<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




Route::post('/expert', 'ExpertController@store');


Route::get('/accident', 'AccidentController@index');
Route::get('/accident/{id}', 'AccidentController@show');
Route::post('/accident', 'AccidentController@store');
Route::put('/accident/{id}', 'AccidentController@update');
Route::delete('/accident/{id}', 'AccidentController@destroy');

Route::get('/image', 'ImageController@index');
Route::get('/image/{id}', 'ImageController@show');
Route::post('/image', 'ImageController@store');
Route::put('/image/{id}', 'ImageController@update');
Route::delete('/image/{id}', 'ImageController@destroy');

Route::get('/accident_image', 'AccidentImageController@index');
Route::get('/accident_image/{id}', 'AccidentImageController@show');
Route::post('/accident_image', 'AccidentImageController@store');
Route::put('/accident_image/{id}', 'AccidentImageController@update');
Route::delete('/accident_image/{id}', 'AccidentImageController@destroy');

Route::get('/accident_expert', 'AccidentExpertController@index');
Route::get('/accident_expert/{id}', 'AccidentExpertController@show');
Route::post('/accident_expert', 'AccidentExpertController@store');
Route::put('/accident_expert/{id}', 'AccidentExpertController@update');
Route::delete('/accident_expert/{id}', 'AccidentExpertController@destroy');

Route::get('/expert_company', 'ExpertCompanyController@index');
Route::get('/expert_company/{id}', 'ExpertCompanyController@show');
Route::post('/expert_company', 'ExpertCompanyController@store');
Route::put('/expert_company/{id}', 'ExpertCompanyController@update');
Route::delete('/expert_company/{id}', 'ExpertCompanyController@destroy');

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');



 Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('/company', 'CompanyController@index');
    Route::get('/company/{id}', 'CompanyController@show');
    Route::post('/company', 'CompanyController@store');
    Route::put('/company/{id}', 'CompanyController@update');
    Route::delete('/company/{id}', 'CompanyController@destroy');

    Route::put('/expert/{id}', 'ExpertController@update');
    Route::delete('/expert/{id}', 'ExpertController@destroy');
    Route::get('/expert', 'ExpertController@index');
    Route::get('/expert/{id}', 'ExpertController@show');
});
