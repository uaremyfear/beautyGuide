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
            'destinationFolder'     => '/images/products/',
            'destinationThumbnail'      => '/images/products/thumbnails/',
            'thumbPrefix'           => 'thumb-',
            'imagePath'             => '/images/products/',
            'thumbnailPath'         => '/images/products/thumbnails/thumb-',
            'thumbHeight'           => 80,
            'thumbWidth'            => 80,
        ],


];