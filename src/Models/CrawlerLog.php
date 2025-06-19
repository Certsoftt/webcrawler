<?php
namespace WebCrawler\Models;

use Illuminate\Database\Eloquent\Model;

class CrawlerLog extends Model
{
    protected $table = 'crawler_logs';
    protected $fillable = [
        'level', 'message', 'source', 'created_at',
    ];
    public $timestamps = false;
}
