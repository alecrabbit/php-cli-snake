<?php

declare(strict_types=1);

namespace AlecRabbit\Snake;

use AlecRabbit\Snake\Contracts\Color;
use AlecRabbit\Snake\Core\Driver;

class Spinner
{
    private const CHARS = ['⠏', '⠛', '⠹', '⢸', '⣰', '⣤', '⣆', '⡇'];
    private const COLORS = [
        196,
        196,
        202,
        202,
        208,
        208,
        214,
        214,
        220,
        220,
        226,
        226,
        190,
        190,
        154,
        154,
        118,
        118,
        82,
        82,
        46,
        46,
        47,
        47,
        48,
        48,
        49,
        49,
        50,
        50,
        51,
        51,
        45,
        45,
        39,
        39,
        33,
        33,
        27,
        27,
        56,
        56,
        57,
        57,
        93,
        93,
        129,
        129,
        165,
        165,
        201,
        201,
        200,
        200,
        199,
        199,
        198,
        198,
        197,
        197,
    ];

    /** @var Driver */
    private $driver;
    /** @var int */
    private $currentCharIdx = 0;
    /** @var int */
    private $currentColorIdx = 0;
    /** @var int */
    private $framesCount;
    /** @var int */
    private $colorCount;
    /** @var bool */
    private $enabled;

    public function __construct(int $colorLevel = Color::COLOR_256)
    {
        $this->enabled = $colorLevel >= Color::NO_COLOR;
        $this->driver = new Driver($colorLevel);
        $this->framesCount = count(self::CHARS);
        $this->colorCount = count(self::COLORS);
    }

    public function spin(): void
    {
        if (!$this->enabled) {
            return;
        }
        $this->driver->write(
            $this->driver->eraseSequence(),
            $this->driver->frameSequence(
                self::COLORS[$this->currentColorIdx],
                self::CHARS[$this->currentCharIdx]
            ),
            $this->driver->moveBackSequence()
        );
        $this->update();
    }

    private function update(): void
    {
        if (++$this->currentCharIdx === $this->framesCount) {
            $this->currentCharIdx = 0;
        }
        if (++$this->currentColorIdx === $this->colorCount) {
            $this->currentColorIdx = 0;
        }
    }

    /**
     * Returns spinner refresh interval
     * @return float
     */
    public function interval(): float
    {
        return 0.1;
    }

    public function begin(): void
    {
        if (!$this->enabled) {
            return;
        }
        $this->driver->hideCursor();
    }

    public function end(): void
    {
        if (!$this->enabled) {
            return;
        }
        $this->erase();
        $this->driver->showCursor();
    }

    public function erase(): void
    {
        if (!$this->enabled) {
            return;
        }
        $this->driver->write(
            $this->driver->eraseSequence()
        );
    }

    public function useStdOut(): void
    {
        if (!$this->enabled) {
            return;
        }
        $this->driver->useStdOut();
//        $this->driver->disableStdErr();
    }

    public function disable(): void
    {
        $this->enabled = false;
    }
}
