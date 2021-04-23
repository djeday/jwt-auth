<?php

namespace App\Utils;

class StringUtil
{
    public static function process(?string $inputString): string
    {
        return trim(stripslashes(htmlspecialchars($inputString)));
    }
}