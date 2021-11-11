<?php

namespace App\Providers;

use App\Models\category;
use Illuminate\Support\ServiceProvider;

class HeaderProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        View()->composer('Front.inc.Header', function ($view) {
            $view->with('categories', category::select('id', 'name')->get());
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
