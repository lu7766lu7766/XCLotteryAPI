<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/8
 * Time: 下午 04:13
 */

use Modules\Lottery\Policies\LotteryClassifiedPolicy;

Route::group([
    'prefix'     => 'lottery_classified/manage',
    'middleware' => ['api'],
    'namespace'  => 'Modules\Lottery\Http\Controllers'
], function () {
    Route::group(['middleware' => 'can:read,' . LotteryClassifiedPolicy::class], function () {
        Route::get('/', 'ManageLotteryClassifiedController@list');
        Route::get('total', 'ManageLotteryClassifiedController@total');
    });
    Route::group(['middleware' => 'can:update,' . LotteryClassifiedPolicy::class], function () {
        Route::get('info', 'ManageLotteryClassifiedController@info');
        Route::post('update', 'ManageLotteryClassifiedController@update');
        Route::post('update_sequence', 'ManageLotteryClassifiedController@updateSequence');
    });
    Route::post('create', 'ManageLotteryClassifiedController@create')
        ->middleware('can:create,' . LotteryClassifiedPolicy::class);
    Route::delete('del', 'ManageLotteryClassifiedController@del')
        ->middleware('can:delete,' . LotteryClassifiedPolicy::class);
    Route::get('options', 'ManageLotteryClassifiedController@options')
        ->middleware('can:options,' . LotteryClassifiedPolicy::class);
});
