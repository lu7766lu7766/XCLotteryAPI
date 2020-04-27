<?php

use Modules\Site\Policies\SitePolicy;

Route::group(
    ['middleware' => 'api', 'prefix' => 'site', 'namespace' => 'Modules\Site\Http\Controllers'],
    function () {
        Route::group(['prefix' => 'manage'], function () {
            Route::get('/', 'ManageSiteController@index')->name('site_manage_index')
                ->middleware('can:manageRead,' . SitePolicy::class);
            Route::post('update', 'ManageSiteController@update')->name('site_manage_update')
                ->middleware('can:manageUpdate,' . SitePolicy::class);
        });
    }
);
