<?php

class GenerateRandom
{

    static function generateNumber($digits)
    {
        $min = pow(10, $digits);
        $max = pow(10, $digits + 1) - 1;
        return rand($min, $max);
    }

    static function generateString($userName)
    {
        //Generate random string
        return substr(str_shuffle(str_repeat($x = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ$userName",
            ceil(32 / strlen($x)))), 1, 64);
    }
}