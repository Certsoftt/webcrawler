<?php
namespace WebCrawler\Models;

use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    protected $table = 'crawled_opportunities';
    protected $fillable = [
        'title', 'summary', 'content', 'type', 'source_url', 'language', 'status', 'meta', 'created_at',
    ];
    public $timestamps = false;
}
