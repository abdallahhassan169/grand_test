<?php
use App\Http\Controllers\Ads;
use App\Http\Controllers\Tags;
use App\Http\Controllers\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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




Route::apiResources([
    'ads' => Ads::class,
    'categories' => Categories::class,
    'tags' => Tags::class

]);

