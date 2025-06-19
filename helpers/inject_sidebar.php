<?php
// Helper to inject the WebCrawler sidebar link if the plugin is enabled
if (function_exists('add_admin_sidebar_link')) {
    add_admin_sidebar_link(function () {
        if (config('webcrawler.enabled')) {
            echo view('webcrawler::includes.sidebar-link')->render();
        }
    });
}
