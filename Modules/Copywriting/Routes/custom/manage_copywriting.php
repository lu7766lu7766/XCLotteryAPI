<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2020/4/6
 * Time: 下午 04:12
 */

use Modules\Copywriting\Policies\CopywritingPolicy;

Route::group([
    'prefix'     => 'copywriting/manage',
    'middleware' => ['api'],
    'namespace'  => 'Modules\Copywriting\Http\Controllers'
], function () {
    Route::group(['middleware' => 'can:read,' . CopywritingPolicy::class], function () {
        Route::get('/', 'ManageCopywritingController@list');
        Route::get('total', 'ManageCopywritingController@total');
    });
    Route::group(['middleware' => 'can:update,' . CopywritingPolicy::class], function () {
        Route::get('info', 'ManageCopywritingController@info');
        Route::post('update', 'ManageCopywritingController@update');
    });
    Route::group(['middleware' => 'can:editorFile,' . CopywritingPolicy::class], function () {
        Route::post('image/upload', 'ManageCopywritingController@uploadImage');
        Route::post('image/remove', 'ManageCopywritingController@removeImage');
    });
    Route::post('create', 'ManageCopywritingController@create')
        ->middleware('can:create,' . CopywritingPolicy::class);
    Route::delete('del', 'ManageCopywritingController@del')
        ->middleware('can:delete,' . CopywritingPolicy::class);
    Route::get('options', 'ManageCopywritingController@options')
        ->middleware('can:options,' . CopywritingPolicy::class);
});
