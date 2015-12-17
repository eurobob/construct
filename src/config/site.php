<?php
return [
    'title' => 'Site Title',
    'subtitle' => 'Subtitle',
    'description' => 'Site description',
    'author' => 'Rob Matwiejczyk',
    'posts_per_page' => 10,
    'uploads' => [
        'storage' => 's3',
        'webpath' => 'https://s3-us-west-1.amazonaws.com/' . env('AWS_BUCKET'),
    ],
    'contact_email' => 'rob@liv.it',
    'image_sizes' => [
        300,
        400,
        500,
        600,
        900,
        1200,
        1500,
        1800,
        2100,
        2400,
        2700,
        3000,
        4000,
    ]
];
