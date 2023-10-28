<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if("admin", function(){
            if(Auth::check() && Auth::user()->user_type == "admin")
                return true;
        });

        $categories = Category::orderBy('name', 'DESC')->get();
        view()->share('categories', $categories);
    }
}
