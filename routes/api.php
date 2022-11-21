<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClassController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\SectionController;
use App\Http\Controllers\Api\StudentController;


Route::apiResource('/class',ClassController::class);
Route::apiResource('/subject',SubjectController::class);
Route::apiResource('/section',SectionController::class);
Route::apiResource('/student',StudentController::class);

Route::group([
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('payload', 'AuthController@payload');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('register', 'AuthController@register');

});
