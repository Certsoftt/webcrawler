<?php
namespace WebCrawler\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CrawlSourceJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $source;

    public function __construct($source)
    {
        $this->source = $source;
    }

    public function handle()
    {
        // Implement crawling logic for the given source
        // Log start/end, errors, and results
        \Log::info('Crawling source', ['source' => $this->source]);
        // ...
    }
}
