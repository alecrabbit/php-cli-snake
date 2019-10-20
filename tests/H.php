<?php

declare(strict_types=1);

namespace AlecRabbit\Tests\Snake;

class H
{
    /**
     * @param string $str $str
     * @return mixed
     */
    public static function xEsc(string $str)
    {
        return str_replace("\033", '\033', $str);
    }
}
