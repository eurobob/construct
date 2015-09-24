<?php
return [
    'title' => 'My Blog',
    'subtitle' => 'blog subtitle',
    'description' => 'blog description',
    'author' => 'Rob Matwiejczyk',
    'page_image' => 'default.jpg',
    'posts_per_page' => 10,
    'uploads' => [
        'storage' => 's3',
        'webpath' => 'https://s3-us-west-2.amazonaws.com/learntech',
    ],
    'contact_email' => 'rob@liv.it', 
];
