<?php

return [

    // Errors go to VH's GlitchTip from production only, and only once the DSN is set
    'dsn' => env('APP_ENV') === 'production' ? env('SENTRY_LARAVEL_DSN') : null,

    'send_default_pii' => false,

    'max_request_body_size' => 'never',

    'traces_sample_rate' => null,

    'ignore_transactions' => [
        '/up',
    ],

];
