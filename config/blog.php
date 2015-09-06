<?php
/**
 * Created by PhpStorm.
 * User: mnobrega
 * Date: 27-07-2015
 * Time: 1:42
 */

return [
    'title' => 'My Blog',
    'posts_per_page' => 5,
    'uploads' => [
        'storage' => 'local',
        'webpath' => '/uploads',
    ],
];

//return [
//    'title' => 'My Blog',
//    'posts_per_page' => 5,
//    'uploads' => [
//        'storage' => 's3',
//        'webpath' => 'https://s3-eu-west-1.amazonaws.com/bktl5beauty/',
//    ],
//];

//return [
//    'title' => 'My Blog',
//    'posts_per_page' => 5,
//    'uploads' => [
//        'storage' => 'dropbox',
//        'webpath' => 'https://api.dropboxapi.com/1/media/auto/',
//    ],
//];