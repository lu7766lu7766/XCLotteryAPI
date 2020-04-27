<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/3/25
 * Time: 下午 02:13
 */
Route::group(
    [
        'middleware' => ['debug_cnf', 'json_response'],
        'prefix'     => 'site',
        'namespace'  => 'Modules\Site\Http\Controllers'
    ],
    function () {
        Route::get('resource_url', 'SiteController@resourceUrl')->name('site_resource_url');
    }
);
