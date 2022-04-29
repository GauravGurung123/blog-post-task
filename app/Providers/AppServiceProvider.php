<?php

namespace App\Providers;

use App\View\Composers\BlogComposer;
use App\View\Composers\CategoryComposer;
use App\View\Composers\TagComposer;
use App\View\Composers\UserComposer;
use App\View\Composers\ViewAllUserComposer;
use Illuminate\Support\Facades\View;
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
    public function boot()
    {
       // Using class based composers...
       View::composer(['home','layouts.header', 'blogs.detail'], CategoryComposer::class);
       View::composer(['home','layouts.header', 'blogs.detail'], TagComposer::class);
       View::composer(['layouts.header' , 'blogs.detail'], BlogComposer::class);
       View::composer(['dashboard.layouts.nav'], UserComposer::class);
       View::composer(['dashboard.users.index'], ViewAllUserComposer::class);

    }
}
