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
    $app->get('dashboard/client/{clientId}/application/{applicationId}', [
        'uses' => 'App\Http\Controllers\ApplicationController@details',
        'as' => 'dashboard.client.application.details'
    ]);

    $app->get('dashboard/client/{clientId}/application/{applicationId}/edit', [
        'uses' => 'App\Http\Controllers\ApplicationController@edit',
        'as' => 'dashboard.client.application.edit'
    ]);
    $app->post('dashboard/client/{clientId}/application/{applicationId}/edit', [
        'uses' => 'App\Http\Controllers\ApplicationController@update'
    ]);

    $app->get('dashboard/client/{clientId}/application/{applicationId}/delete', [
        'uses' => 'App\Http\Controllers\ApplicationController@delete',
        'as' => 'dashboard.client.application.delete'
    ]);

    $app->get('dashboard/client/{clientId}/applications/add', [
        'uses' => 'App\Http\Controllers\ApplicationController@add',
        'as' => 'dashboard.client.application.add'
    ]);
    $app->post('dashboard/client/{clientId}/applications/add', [
        'uses' => 'App\Http\Controllers\ApplicationController@insert'
    ]);


    $app->get('dashboard/models', [
        'uses' => 'App\Http\Controllers\ModelController@index',
        'as' => 'dashboard.model'
    ]);
    $app->get('dashboard/models/export', [
        'uses' => 'App\Http\Controllers\ModelController@export',
        'as' => 'dashboard.model.export'
    ]);

    $app->get('dashboard/model/{modelName}', [
        'uses' => 'App\Http\Controllers\ModelController@details',
        'as' => 'dashboard.model.details'
    ]);

    $app->get('dashboard/model/{modelName}/delete', [
        'uses' => 'App\Http\Controllers\ModelController@delete',
        'as' => 'dashboard.model.delete'
    ]);

    $app->get('dashboard/models/add', [
        'uses' => 'App\Http\Controllers\ModelController@add',
        'as' => 'dashboard.model.add'
    ]);
    $app->post('dashboard/models/add', [
        'uses' => 'App\Http\Controllers\ModelController@insert'
    ]);

});