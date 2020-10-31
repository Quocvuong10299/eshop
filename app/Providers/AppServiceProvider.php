<?php

namespace App\Providers;


use App\Mail\SendEmail;
use App\Token\Token;
use Illuminate\Support\ServiceProvider;
use App\Models\Categories;

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
        $this->app->bind(SendEmail::class, function ($app) {
            return new SendEmail();
        });

        $this->app->bind(Token::class, function ($app) {
            return new Token();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['admin.categories.edit_categories'], function ($view) {

            $cate_parent = Categories::where('parent',NULL)->get();
            return $view->with(compact('cate_parent'));
        });
    }
}
