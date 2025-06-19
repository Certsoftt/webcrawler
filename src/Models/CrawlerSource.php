<?php
namespace WebCrawler\Models;

use Illuminate\Database\Eloquent\Model;

class CrawlerSource extends Model
{
    protected $table = 'crawler_sources';
    protected $fillable = [
        'name', 'url', 'type', 'active', 'meta', 'created_at',
    ];
    public $timestamps = false;
}
