<?php
/**
 * Created by PhpStorm.
 * User: mnobrega
 * Date: 04-09-2015
 * Time: 0:42
 */

function human_filesize($bytes, $decimals=2)
{
    $size = ['B','kB','MB','GB','TB','PB'];
    $factor = floor((strlen($bytes)-1)/3);

    return sprintf("%.{$decimals}f",$bytes/pow(1024,$factor)).@$size[$factor];
}

function is_image($mimeType)
{
    return starts_with($mimeType,'image/');
}