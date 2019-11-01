<?php declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use AlecRabbit\Snake\Contracts\Color;
use AlecRabbit\Snake\Spinner;
use React\EventLoop\Factory;

$s = new Spinner(Color::COLOR_16); // Downgrade color mode, default is Color::COLOR_256
$s->useStdOut(); // optional, use STDOUT instead of STDERR

$loop = Factory::create();

$loop->addPeriodicTimer($s->interval(), static function () use ($s) {
    $s->spin();
});

// Run only for two seconds
$loop->addTimer(2, static function () use ($loop) {
    $loop->stop();
});

$loop->addTimer(0.5, static function () {
    dots();
});

$loop->addTimer(0.9, static function () {
    echo 'Message One: is written to StdOut.' . PHP_EOL;
    dots();
});

$loop->addTimer(1.7, static function () {
    echo 'Message Two: is written to StdOut.' . PHP_EOL;
    dots();
});

$s->begin();

$loop->run();

$s->end();

echo PHP_EOL;

function dots() {
    echo '......';
}
