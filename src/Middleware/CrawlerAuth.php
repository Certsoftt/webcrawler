<?php
namespace WebCrawler\Middleware;

use Closure;
use Illuminate\Http\Request;

class CrawlerAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Add logic for authenticating crawler requests if needed
        return $next($request);
    }
}
