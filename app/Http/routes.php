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

use Laravel\Lumen\Application;

$app->get('/', function () use ($app) {
    return $app->welcome();
});

$app->group([], function ($app) {
    /** @var Application $app */

    // DASHBOARD
    $app->get('dashboard', [
        'uses' => 'App\Http\Controllers\DashboardController@index',
        'as' => 'dashboard'
    ]);

    $app->get('dashboard/login', [
        'uses' => 'App\Http\Controllers\DashboardController@login',
        'as' => 'dashboard.login'
    ]);

    $app->post('dashboard/authorizeClient', [
        'uses' => 'App\Http\Controllers\DashboardController@authorizeClient',
        'as' => 'dashboard.authorizeClient'
    ]);
});