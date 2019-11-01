<?php

declare(strict_types=1);

namespace AlecRabbit\Snake\Contracts;

class Color
{
//    public const NO_ANSI = -1;
    public const NO_COLOR = 0;
    public const COLOR_16 = 16;
    public const COLOR_256 = 256;

    public const ALLOWED = [
//        self::NO_ANSI,
        self::NO_COLOR,
        self::COLOR_16,
        self::COLOR_256,
    ];
}
