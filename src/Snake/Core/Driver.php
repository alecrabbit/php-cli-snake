<?php

declare(strict_types=1);

namespace AlecRabbit\Snake\Core;

use AlecRabbit\Snake\Contracts\Color;

class Driver
{
    public const HIDE_CURSOR_SEQ = "\033[?25l";
    public const SHOW_CURSOR_SEQ = "\033[?25h";

    /** @var false|resource */
    private $stream = STDERR;

    /** @var int */
    private $colorLevel;

    public function __construct(int $colorLevel)
    {
        $this->setColorLevel($colorLevel);
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

    public function moveBackSequence(): string
    {
        return "\033[1D";
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
        $this->write(self::HIDE_CURSOR_SEQ);
    }

    /**
     * @codeCoverageIgnore
     *
     * @param string ...$text
     */
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

    public function showCursor(): void
    {
        $this->write(self::SHOW_CURSOR_SEQ);
    }

    /**
     * @codeCoverageIgnore
     */
    public function disableStdErr(): void
    {
        $this->stream = false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function useStdOut(): void
    {
        $this->stream = STDOUT;
    }
}
