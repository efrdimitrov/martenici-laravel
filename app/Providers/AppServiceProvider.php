<?php

namespace App\Providers;

use App\Models\Article;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        view()->share('braceletsCount', Article::where('category', 'LIKE', '%гривна%')
            ->where('quantity', '>', '0')
            ->count());
        view()->share('ladiesCount', Article::where('category', 'LIKE', '%дамска%')
            ->where('quantity', '>', '0')
            ->count());
        view()->share('kidsCount', Article::where('category', 'LIKE', '%детска%')
            ->where('quantity', '>', '0')
            ->count());
        view()->share('homesCount', Article::where('category', 'LIKE', '%за дома%')
            ->where('quantity', '>', '0')
            ->count());
        view()->share('hangingsCount', Article::where('category', 'LIKE', '%закачаща%')
            ->where('quantity', '>', '0')
            ->count());
        view()->share('medallionsCount', Article::where('category', 'LIKE', '%медальон%')
            ->where('quantity', '>', '0')
            ->count());
        view()->share('packagesCount', Article::where('category', 'LIKE', '%повече бройки%')
            ->where('quantity', '>', '0')
            ->count());
        // all articles and models
        view()->share('allModelsCount', Article::count());
        view()->share('allArticlesCount', Article::sum('quantity'));
    }
}
