<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/3/27
 * Time: 下午 04:38
 */

use Modules\News\Policies\NewsClassifiedPolicy;

Route::group([
    'prefix'     => 'news_classified/manage',
    'middleware' => ['api'],
    'namespace'  => 'Modules\News\Http\Controllers'
], function () {
    Route::group([
        'middleware' => 'can:manageUpdate,' . NewsClassifiedPolicy::class
    ], function () {
        Route::post('update', 'ManageNewsClassifiedController@update');
        Route::get('info', 'ManageNewsClassifiedController@info');
    });
    Route::get('/', 'ManageNewsClassifiedController@list')
        ->middleware('can:manageRead,' . NewsClassifiedPolicy::class);
    Route::get('options', 'ManageNewsClassifiedController@options')
        ->middleware('can:options,' . NewsClassifiedPolicy::class);
});
