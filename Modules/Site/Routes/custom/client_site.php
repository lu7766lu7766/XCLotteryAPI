<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/27
 * Time: 下午 04:52
 */
Route::group(
    [
        'middleware' => ['debug_cnf', 'json_response'],
        'prefix'     => 'site/client',
        'namespace'  => 'Modules\Site\Http\Controllers'
    ],
    function () {
        Route::get('settings', 'ClientSiteController@settings')->name('site_client_settings');
    }
);
