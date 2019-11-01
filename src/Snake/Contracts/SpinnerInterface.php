<?php

declare(strict_types=1);

namespace AlecRabbit\Snake\Contracts;

interface SpinnerInterface
{
    public function spin(): void;

    /**
     * Returns spinner refresh interval
     * @return float
     */
    public function interval(): float;

    public function begin(): void;

    public function end(): void;

    public function erase(): void;

    /**
     * Switch to STDOUT instead of STDERR
     */
    public function useStdOut(): void;
}
