<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/16
 * Time: 上午 10:33
 */

use Modules\Lottery\Policies\LotteryResultPolicy;

Route::group([
    'prefix'     => 'lottery_result/manage',
    'middleware' => ['api'],
    'namespace'  => 'Modules\Lottery\Http\Controllers'
], function () {
    Route::group(['middleware' => 'can:read,' . LotteryResultPolicy::class], function () {
        Route::get('/', 'ManageLotteryResultController@list');
        Route::get('total', 'ManageLotteryResultController@total');
        Route::get('options', 'ManageLotteryResultController@options');
    });
    Route::group(['middleware' => 'can:update,' . LotteryResultPolicy::class], function () {
        Route::get('info', 'ManageLotteryResultController@info');
        Route::post('update', 'ManageLotteryResultController@update');
    });
    Route::delete('del', 'ManageLotteryResultController@del')
        ->middleware('can:delete,' . LotteryResultPolicy::class);
});
