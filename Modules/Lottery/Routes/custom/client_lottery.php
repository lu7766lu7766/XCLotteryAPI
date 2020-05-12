<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/5/7
 * Time: 下午 10:33
 */
Route::group([
    'prefix'     => 'lottery/client',
    'middleware' => ['debug_cnf', 'json_response'],
    'namespace'  => 'Modules\Lottery\Http\Controllers'
], function () {
    Route::get('info', 'ClientLotteryController@info');
});
