<?php

if (env('HUPUN_TEST_ENV')) {
    return [
        'api_key' => env('HUPUN_TEST_API_KEY'),
        'api_serect' => env('HUPUN_TEST_API_SERECT'),
        'api_options' => [
            'api_url' => env('HUPUN_TEST_API_URL'),
            'api_work_dir' => storage_path('app/hupun/data'),
        ],
    ];
} else {
    return [
        'api_key' => env('HUPUN_API_KEY'),
        'api_serect' => env('HUPUN_API_SERECT'),
        'api_options' => [
            'api_url' => env('HUPUN_API_URL'),
            'api_work_dir' => storage_path('app/hupun/data'),
        ],
    ];
}
