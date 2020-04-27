<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2020/3/25
 * Time: 下午 07:53
 */

use Modules\Advertisement\Policies\ManageAdvertisementPolicy;

Route::group(
    [
        'middleware' => 'api',
        'prefix'     => 'advertisement/manage',
        'namespace'  => 'Modules\Advertisement\Http\Controllers'
    ],
    function () {
        Route::group(['middleware' => 'can:read,' . ManageAdvertisementPolicy::class], function () {
            Route::get('/', 'ManageAdvertisementController@index');
            Route::get('/total', 'ManageAdvertisementController@total');
        });
        Route::group(['middleware' => 'can:update,' . ManageAdvertisementPolicy::class], function () {
            Route::get('/edit', 'ManageAdvertisementController@edit');
            Route::post('/update', 'ManageAdvertisementController@update');
        });
        Route::post('/', 'ManageAdvertisementController@store')
            ->middleware('can:create,' . ManageAdvertisementPolicy::class);
        Route::delete('/', 'ManageAdvertisementController@delete')
            ->middleware('can:delete,' . ManageAdvertisementPolicy::class);
        Route::get('/type', 'ManageAdvertisementController@type')
            ->middleware('can:type,' . ManageAdvertisementPolicy::class);
    }
);
