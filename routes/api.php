<?php
use Illuminate\Support\Facades\Route;
use WebCrawler\Http\Controllers\WebCrawlerController;

Route::middleware(['api', 'auth:api', 'can:manage-crawler'])
    ->prefix('webcrawler')
    ->group(function () {
        Route::get('/sources', [WebCrawlerController::class, 'sources']);
        Route::post('/sources', [WebCrawlerController::class, 'addSource']);
        Route::put('/sources/{id}', [WebCrawlerController::class, 'updateSource']);
        Route::delete('/sources/{id}', [WebCrawlerController::class, 'deleteSource']);
        Route::get('/logs', [WebCrawlerController::class, 'logs']);
        Route::get('/settings', [WebCrawlerController::class, 'settings']);
    });
