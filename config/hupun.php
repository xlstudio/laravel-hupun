<?php

return [
    'b2c_app_key' => env('HUPUN_B2C_APP_KEY', ''),
    'b2c_app_serect' => env('HUPUN_B2C_APP_SERECT', ''),
    'b2c_api_url' => env('HUPUN_B2C_API_URL', 'https://erp-open.hupun.com/api'),
    'b2c_api_work_dir' =>storage_path('logs'),

    'open_app_key' => env('HUPUN_OPEN_APP_KEY', ''),
    'open_app_serect' => env('HUPUN_OPEN_APP_SERECT', ''),
    'open_api_url' => env('HUPUN_OPEN_API_URL', 'https://open-api.hupun.com/api'),
    'open_api_work_dir' =>storage_path('logs'),
];
