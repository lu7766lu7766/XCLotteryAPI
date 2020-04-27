<?php

namespace App\Providers;

use Illuminate\Contracts\Filesystem\Cloud;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Modules\Announcement\Entities\Announcement;
use Modules\Files\Contracts\IEditorFilesProvider;
use Modules\Files\Repositories\EditorFilesRepo;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Cloud::class, function (Application $app) {
            return $app->environment(['production', 'testing']) ? \Storage::disk('s3') : \Storage::disk('public');
        });
        $this->app->bind(IEditorFilesProvider::class, function (Application $app) {
            return new EditorFilesRepo();
        });
        Relation::morphMap(['announcement' => Announcement::class]);
    }
}
