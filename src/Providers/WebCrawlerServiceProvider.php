<?php
namespace WebCrawler\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;

class WebCrawlerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (Config::get('webcrawler.enabled')) {
            $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
            $this->loadRoutesFrom(__DIR__.'/../../routes/api.php');
            $this->loadViewsFrom(__DIR__.'/../../views', 'webcrawler');
            $this->loadTranslationsFrom(__DIR__.'/../../lang', 'webcrawler');
            $this->publishes([
                __DIR__.'/../../public' => public_path('plugins/webcrawler'),
            ], 'public');
            // Register sidebar widget directive
            Blade::directive('webcrawlerSidebar', function () {
                return "<?php if (config('webcrawler.enabled')) echo view('webcrawler::includes.sidebar-link')->render(); ?>";
            });
        }
        // Register the AuthServiceProvider for permissions
        $this->app->register(\WebCrawler\Providers\WebCrawlerAuthServiceProvider::class);
    }
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/config.php', 'webcrawler');
    }
}
