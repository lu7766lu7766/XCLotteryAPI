<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/28
 * Time: 上午 09:55
 */
Route::group(
    [
        'middleware' => ['debug_cnf', 'json_response'],
        'prefix'     => 'advertisement/client',
        'namespace'  => 'Modules\Advertisement\Http\Controllers'
    ],
    function () {
        Route::get('/', 'ClientAdvertisementController@list');
        Route::get('type_list', 'ClientAdvertisementController@typeList');
    }
);
