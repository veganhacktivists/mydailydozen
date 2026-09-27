<?php

// Only the upload settings differ from Livewire's defaults
return [
    'temporary_file_upload' => [
        'disk' => null,
        // Nothing in the app takes uploads, so every file is refused before it's stored
        'rules' => ['prohibited'],
        'directory' => null,
        'middleware' => 'throttle:5,1',
        'preview_mimes' => [
            'png', 'gif', 'bmp', 'svg', 'wav', 'mp4',
            'mov', 'avi', 'wmv', 'mp3', 'm4a',
            'jpg', 'jpeg', 'mpga', 'webp', 'wma',
        ],
        'max_upload_time' => 5,
        'cleanup' => true,
    ],
];
