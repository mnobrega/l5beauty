<?php
/**
 * Created by PhpStorm.
 * User: mnobrega
 * Date: 27-07-2015
 * Time: 1:42
 */

$configBase = [
    'name' => 'L5 Beauty',
    'title' => "Laravel 5.1 Beauty",
    'subtitle' => 'A clean blog written in Laravel 5.1',
    'description' => 'This is my meta description',
    'author' => 'Chuck Heintzelman',
    'page_image' => 'home-bg.jpg',
    'posts_per_page' => 10,
];

$fileStorageDisk = [
    'uploads' => [
        'storage' => 'local',
        'webpath' => '/uploads',
    ],
];

$fileStorageS3 = [
    'uploads' => [
        'storage' => 's3',
        'webpath' => 'https://s3-eu-west-1.amazonaws.com/bktl5beauty/',
    ],
];

$fileStorageDropbox = [
    'uploads' => [
        'storage' => 'dropbox',
        'webpath' => 'https://api.dropboxapi.com/1/media/auto/',
    ],
];

$configbase = array_merge($configBase,$fileStorageDisk);