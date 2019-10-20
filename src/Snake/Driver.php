<?php

declare(strict_types=1);

namespace AlecRabbit\Snake;

class Driver
{
    /** @var false|resource */
    private $stream = STDERR;

    /** @var int */
    private $colorLevel;

    public function __construct(int $colorLevel)
    {
        $this->setColorLevel($colorLevel);
    }


    public function moveBackSequence(): string
    {
        return "\033[1D";
    }

    public function erase(): void
    {
        $this->write("\033[1X");
    }

    public function write(string ...$text): void
    {
        foreach ($text as $s) {
            if (false === $this->stream) {
                echo $s;
            } elseif (false === @fwrite($this->stream, $s)) {
                // should never happen
                throw new \RuntimeException('Unable to write stream.');
            }
        }
        if (false !== $this->stream) {
            fflush($this->stream);
        }
    }

    public function eraseSequence(): string
    {
        return "\033[1X";
    }

    public function frameSequence(int $fg, string $char): string
    {
        if (Color::COLOR_256 === $this->colorLevel) {
            return "\033[38;5;{$fg}m{$char}\033[0m";
        }
        if (Color::COLOR_16 === $this->colorLevel) {
            return "\033[96m{$char}\033[0m";
        }
        return $char;
    }

    public function hideCursor(): void
    {
        $this->write("\033[?25l");
    }

    public function showCursor(): void
    {
        $this->write("\033[?25h");
    }

    public function disableStdErr(): void
    {
        $this->stream = false;
    }

    /**
     * @param int $colorLevel
     */
    public function setColorLevel(int $colorLevel): void
    {
        if (!in_array($colorLevel, Color::ALLOWED, true)) {
            throw new \InvalidArgumentException('Unknown color level.');
        }
        $this->colorLevel = $colorLevel;
    }
}
