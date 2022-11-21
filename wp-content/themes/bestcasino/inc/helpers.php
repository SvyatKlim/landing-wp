<?php
/*
 * Debug output
 * $type – can be dump or print (var_dump and print_r respectively)
 */
function debug_dump($data, $die = false, $dump = true)
{
    echo "<pre>";
    if ($dump) var_dump($data);
    else print_r($data);
    echo "</pre>";
    if ($die) wp_die();
}

function get_image_alt($url){
$fileParts = pathinfo($url);
return  $fileParts ['filename'];
}


