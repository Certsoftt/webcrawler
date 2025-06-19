<?php
return [
    'enabled' => env('WEBCRAWLER_ENABLED', true),
    'default_language' => 'en',
    'supported_languages' => ['en'], // Extend as per app localization
    'opportunity_types' => ['scholarship', 'fellowship', 'job', 'competition'],
    'schedule' => 'daily',
    'deduplicate' => true,
    'log_errors' => true,
];
