<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/29
 * Time: 上午 09:09
 */
Route::group(
    [
        'middleware' => ['debug_cnf', 'json_response'],
        'prefix'     => 'lottery_result/client',
        'namespace'  => 'Modules\Lottery\Http\Controllers'
    ],
    function () {
        Route::get('/', 'ClientLotteryResultController@list');
    }
);
