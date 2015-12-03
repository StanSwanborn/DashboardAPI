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
    return redirect()->to('dashboard');
});

$app->group([], function($app) {
    /** @var Application $app */

    $app->get('dashboard/login', [
        'uses' => 'App\Http\Controllers\DashboardController@login',
        'as' => 'dashboard.login'
    ]);

    $app->post('dashboard/authorizeClient', [
        'uses' => 'App\Http\Controllers\DashboardController@authorizeClient',
        'as' => 'dashboard.authorizeClient'
    ]);
});


$app->group(['middleware' => 'auth'], function ($app) {
    /** @var Application $app */

    // DASHBOARD
    $app->get('dashboard', [
        'uses' => 'App\Http\Controllers\DashboardController@index',
        'as' => 'dashboard'
    ]);

    $app->get('dashboard/logout', [
        'uses' => 'App\Http\Controllers\DashboardController@logout',
        'as' => 'dashboard.logout'
    ]);

    $app->get('dashboard/clients', [
        'uses' => 'App\Http\Controllers\ClientController@index',
        'as' => 'dashboard.client'
    ]);
    $app->get('dashboard/client/{clientId}/applications', [
        'uses' => 'App\Http\Controllers\ApplicationController@index',
        'as' => 'dashboard.client.application'
    ]);
});