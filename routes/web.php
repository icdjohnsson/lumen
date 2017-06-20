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

// Main application
$app->get('/', function () use ($app) {
    return response()->json(['name' => env('APP_NAME', 'icdjohnsson-lumen'), 'verison' => env('VERSION', 'x')], 200);
});
