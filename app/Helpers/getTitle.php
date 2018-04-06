<?php

function getTitle($title, $length = 30) {
    $output = '';
    
    if (strlen($title) > $length) {
        $output = substr($title, 0, $length) . '...';
    } else {
        $output = $title;
    }
    
    return $output;
}
