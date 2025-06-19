<?php
namespace WebCrawler\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class WebCrawlerAuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Gate::define('webcrawler.manage_sources', function ($user) {
            return $user->hasRole('admin') || $user->hasPermissionTo('webcrawler.manage_sources');
        });
    }
}
