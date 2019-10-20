<?php

namespace AlecRabbit\Snake;

use PHPUnit\Framework\TestCase;

class SpinnerTest extends TestCase
{
    /** @test */
    public function constructor(): void
    {
        $s = new Spinner();
        $this->assertInstanceOf(Spinner::class, $s);
        $this->assertEquals(0.1, $s->interval());
    }
}
