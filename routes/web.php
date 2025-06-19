<?php
use Illuminate\Support\Facades\Route;
use WebCrawler\Http\Controllers\WebCrawlerController;

Route::middleware(['web', 'auth', 'can:manage-crawler'])
    ->prefix('admin/webcrawler')
    ->group(function () {
        Route::get('/sources', [WebCrawlerController::class, 'sourcesPage']);
        Route::get('/logs', [WebCrawlerController::class, 'logsPage']);
        Route::get('/settings', [WebCrawlerController::class, 'settingsPage']);
        Route::get('/content-preview/{id}', [WebCrawlerController::class, 'contentPreview'])->name('admin.webcrawler.contentPreview');
        Route::post('/content-preview/{id}/ai', [WebCrawlerController::class, 'sendToAI'])->name('admin.webcrawler.sendToAI');
        Route::post('/settings/save', [WebCrawlerController::class, 'saveSettings'])->name('admin.webcrawler.settings.save');
    });
