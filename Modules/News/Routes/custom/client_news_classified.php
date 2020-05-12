<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/5/5
 * Time: 下午 06:21
 */
Route::group(
    [
        'middleware' => ['debug_cnf', 'json_response'],
        'prefix'     => 'news_classified/client',
        'namespace'  => 'Modules\News\Http\Controllers'
    ],
    function () {
        Route::get('all', 'ClientNewsClassifiedController@all');
    }
);
