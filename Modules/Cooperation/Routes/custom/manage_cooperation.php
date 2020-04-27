<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/1
 * Time: 下午 03:59
 */

use Modules\Cooperation\Policies\CooperationPolicy;

Route::group([
    'prefix'     => 'cooperation/manage',
    'middleware' => ['api'],
    'namespace'  => 'Modules\Cooperation\Http\Controllers'
], function () {
    Route::group(['middleware' => 'can:read,' . CooperationPolicy::class], function () {
        Route::get('/', 'ManageCooperationController@list');
        Route::get('total', 'ManageCooperationController@total');
    });
    Route::group(['middleware' => 'can:update,' . CooperationPolicy::class], function () {
        Route::get('info', 'ManageCooperationController@info');
        Route::post('update', 'ManageCooperationController@update');
    });
    Route::post('create', 'ManageCooperationController@create')
        ->middleware('can:create,' . CooperationPolicy::class);
    Route::delete('del', 'ManageCooperationController@del')
        ->middleware('can:delete,' . CooperationPolicy::class);
    Route::get('options', 'ManageCooperationController@options')
        ->middleware('can:options,' . CooperationPolicy::class);
});
