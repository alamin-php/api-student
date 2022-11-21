<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClassController;
use App\Http\Controllers\Api\SubjectController;


Route::apiResource('/class',ClassController::class);
Route::apiResource('/subject',SubjectController::class);
