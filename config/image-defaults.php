<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Image Paths and Settings
    |--------------------------------------------------------------------------
    |
    |
    | We set the config here so that we can keep our controllers clean.
    | Configure each image type with an image path.
    |
    */

        'marketingImage' => [
            'destinationFolder'     => '/images/posts/',
            'destinationThumbnail'      => '/images/posts/thumbnails/',
            'thumbPrefix'           => 'thumb-',
            'imagePath'             => '/images/posts/',
            'thumbnailPath'         => '/images/posts/thumbnails/thumb-',
            'thumbHeight'           => 320,
            'thumbWidth'            => 480,
        ],

        'subcontentImage' => [
            'destinationFolder'     => '/images/subcontents/',
            'destinationThumbnail'      => '/images/subcontents/thumbnails/',
            'thumbPrefix'           => 'thumb-',
            'imagePath'             => '/images/subcontents/',
            'thumbnailPath'         => '/images/subcontents/thumbnails/thumb-',
            'thumbHeight'           => 320,
            'thumbWidth'            => 480,            
        ],
];