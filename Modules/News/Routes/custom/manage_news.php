<?php

use Modules\News\Policies\NewsPolicy;

Route::group([
    'prefix'     => 'news/manage',
    'middleware' => ['api'],
    'namespace'  => 'Modules\News\Http\Controllers'
], function () {
    Route::group(['middleware' => 'can:read,' . NewsPolicy::class], function () {
        Route::get('/', 'ManageNewsController@list');
        Route::get('total', 'ManageNewsController@total');
    });
    Route::group(['middleware' => 'can:update,' . NewsPolicy::class], function () {
        Route::get('full_text', 'ManageNewsController@fullText');
        Route::post('update', 'ManageNewsController@update');
    });
    Route::delete('del', 'ManageNewsController@del')
        ->middleware('can:delete,' . NewsPolicy::class);
    Route::get('options', 'ManageNewsController@options')
        ->middleware('can:options,' . NewsPolicy::class);
});
