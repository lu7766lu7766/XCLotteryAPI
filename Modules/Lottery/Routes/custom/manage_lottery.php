<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/16
 * Time: 上午 10:33
 */

use Modules\Lottery\Policies\LotteryPolicy;

Route::group([
    'prefix'     => 'lottery/manage',
    'middleware' => ['api'],
    'namespace'  => 'Modules\Lottery\Http\Controllers'
], function () {
    Route::group(['middleware' => 'can:read,' . LotteryPolicy::class], function () {
        Route::get('/', 'ManageLotteryController@list');
        Route::get('total', 'ManageLotteryController@total');
    });
    Route::group(['middleware' => 'can:update,' . LotteryPolicy::class], function () {
        Route::get('info', 'ManageLotteryController@info');
        Route::post('update', 'ManageLotteryController@update');
    });
    Route::delete('del', 'ManageLotteryController@del')
        ->middleware('can:delete,' . LotteryPolicy::class);
    Route::get('options', 'ManageLotteryController@options')
        ->middleware('can:options,' . LotteryPolicy::class);
});
