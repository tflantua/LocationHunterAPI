<?php

class StatusMessage
{
    static function code($code)
    {
        return array(
            "statusCode" => $code
        );
    }
}