<?php

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}
function s($html):string{
    $s = htmlspecialchars($html);
    $s=filter_var($s,FILTER_SANITIZE_FULL_SPECIAL_CHARS,FILTER_FLAG_NO_ENCODE_QUOTES);
    
    $s=filter_var($s,FILTER_SANITIZE_URL);
    return $s;
}