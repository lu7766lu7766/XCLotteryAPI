<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/28
 * Time: 上午 10:52
 */
Route::group([
    'prefix'     => 'lottery_classified/client',
    'middleware' => ['debug_cnf', 'json_response'],
    'namespace'  => 'Modules\Lottery\Http\Controllers'
], function () {
    Route::get('all', 'ClientLotteryClassifiedController@all');
    Route::get('list', 'ClientLotteryClassifiedController@list');
});
