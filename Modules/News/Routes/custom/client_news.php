<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/29
 * Time: 下午 01:53
 */
Route::group(
    [
        'middleware' => ['debug_cnf', 'json_response'],
        'prefix'     => 'news/client',
        'namespace'  => 'Modules\News\Http\Controllers'
    ],
    function () {
        Route::get('/', 'ClientNewsController@list');
        Route::get('total', 'ClientNewsController@total');
        Route::get('full_text', 'ClientNewsController@fullText');
        Route::get('latest', 'ClientNewsController@latest');
    }
);
