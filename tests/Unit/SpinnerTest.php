<?php

namespace AlecRabbit\Snake;

use AlecRabbit\Snake\Contracts\Color;
use AlecRabbit\Snake\Core\Driver;
use AlecRabbit\Tests\Snake\H;
use PHPUnit\Framework\TestCase;
use ReflectionProperty;

class SpinnerTest extends TestCase
{
    public const UNKNOWN_COLOR_LEVEL = 'Unknown color level.';

    /** @test */
    public function constructor(): void
    {
        $s = new Spinner();
        $this->assertInstanceOf(Spinner::class, $s);
        $this->assertEquals(0.1, $s->interval());
        $driver = $this->replaceDriver($s);
        $s->begin();
        $this->assertEquals(H::xEsc("\033[?25l"), H::xEsc($driver->getBuffer()));
        $s->spin();
        $this->assertEquals(H::xEsc("\033[1X⠏\033[1D"), H::xEsc($driver->getBuffer()));
        $s->spin();
        $this->assertEquals(H::xEsc("\033[1X⠛\033[1D"), H::xEsc($driver->getBuffer()));
        $s->spin();
        $this->assertEquals(H::xEsc("\033[1X⠹\033[1D"), H::xEsc($driver->getBuffer()));
        $s->spin();
        $this->assertEquals(H::xEsc("\033[1X⢸\033[1D"), H::xEsc($driver->getBuffer()));
        $s->spin();
        $this->assertEquals(H::xEsc("\033[1X⣰\033[1D"), H::xEsc($driver->getBuffer()));
        $s->spin();
        $this->assertEquals(H::xEsc("\033[1X⣤\033[1D"), H::xEsc($driver->getBuffer()));
        $s->spin();
        $this->assertEquals(H::xEsc("\033[1X⣆\033[1D"), H::xEsc($driver->getBuffer()));
        $s->spin();
        $this->assertEquals(H::xEsc("\033[1X⡇\033[1D"), H::xEsc($driver->getBuffer()));
        $s->end();
        $this->assertEquals(H::xEsc("\033[1X\033[?25h"), H::xEsc($driver->getBuffer()));
    }

    /**
     * @param Spinner $s
     * @param int $colorLevel
     * @return Driver|ReflectionProperty
     */
    protected function replaceDriver(Spinner $s, int $colorLevel = Color::NO_COLOR)
    {
        try {
            $driver = new ReflectionProperty(get_class($s), 'driver');
            $driver->setAccessible(true);
            $driver->setValue(
                $s,
                new class ($colorLevel) extends Driver
                {
                    /** @var string */
                    public $buffer = '';

                    public function write(string ...$text): void
                    {
                        foreach ($text as $s) {
                            $this->buffer .= $s;
                        }
                    }

                    /**
                     * @return string
                     */
                    public function getBuffer(): string
                    {
                        $b = $this->buffer;
                        $this->buffer = '';
                        return $b;
                    }
                }
            );
            return $driver->getValue($s);
        } catch (\ReflectionException $e) {
            $this->fail('Unable to reflect property.');
        }
        // intentionally no return
    }

    /** @test */
    public function withError(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(self::UNKNOWN_COLOR_LEVEL);
        $s = new Spinner(2);
    }

    /** @test */
    public function withError2(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(self::UNKNOWN_COLOR_LEVEL);
        $s = new Spinner(-1);
    }
}
