<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2020/3/30
 * Time: 下午 04:28
 */

use Modules\Announcement\Policies\ManageAnnouncementPolicy;

Route::group(
    [
        'middleware' => 'api',
        'prefix'     => 'announcement/manage',
        'namespace'  => 'Modules\Announcement\Http\Controllers'
    ],
    function () {
        Route::group(['middleware' => 'can:read,' . ManageAnnouncementPolicy::class], function () {
            Route::get('/', 'ManageAnnouncementController@index');
            Route::get('/total', 'ManageAnnouncementController@total');
        });
        Route::group(['middleware' => 'can:update,' . ManageAnnouncementPolicy::class], function () {
            Route::get('/edit', 'ManageAnnouncementController@edit');
            Route::post('/update', 'ManageAnnouncementController@update');
        });
        Route::group(['middleware' => 'can:editorFile,' . ManageAnnouncementPolicy::class], function () {
            Route::post('image/upload', 'ManageAnnouncementController@uploadImage');
            Route::post('image/remove', 'ManageAnnouncementController@removeImage');
        });
        Route::post('/', 'ManageAnnouncementController@store')
            ->middleware('can:create,' . ManageAnnouncementPolicy::class);
        Route::delete('/', 'ManageAnnouncementController@delete')
            ->middleware('can:delete,' . ManageAnnouncementPolicy::class);
        Route::get('/options', 'ManageAnnouncementController@options')
            ->middleware('can:options,' . ManageAnnouncementPolicy::class);
    }
);
