<?php
namespace WebCrawler\Services;

class CrawlerService
{
    // Main crawling logic for HTML, RSS, and social media

    public function crawl($source)
    {
        // Example: Dispatch a job for heavy crawling
        \WebCrawler\Jobs\CrawlSourceJob::dispatch($source);
    }
}
