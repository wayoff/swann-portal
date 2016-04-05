<?php

if( !function_exists('string_pad')) {

    function string_pad($value, $length = 5, $filler = '0')
    {
        return str_pad($value, $length, $filler, STR_PAD_LEFT);
    }
    
}

if( !function_exists('default_img')) {

    function default_img()
    {
        return url(config('swannportal.path.default-img'));
    }
    
}