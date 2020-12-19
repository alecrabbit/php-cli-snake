# 🐍 PHP CLI Snake

## Lightweight cli snake spinner with zero dependencies


[![PHP Version](https://img.shields.io/packagist/php-v/alecrabbit/php-cli-snake.svg)](https://php.net)
[![Build Status](https://travis-ci.com/alecrabbit/php-cli-snake.svg?branch=master)](https://travis-ci.com/alecrabbit/php-cli-snake)
[![Appveyor Status](https://img.shields.io/appveyor/ci/alecrabbit/php-cli-snake.svg?label=appveyor)](https://ci.appveyor.com/project/alecrabbit/php-cli-snake/branch/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/alecrabbit/php-cli-snake/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/alecrabbit/php-cli-snake/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/alecrabbit/php-cli-snake/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/alecrabbit/php-cli-snake/?branch=master)
[![Total Downloads](https://poser.pugx.org/alecrabbit/php-cli-snake/downloads)](https://packagist.org/packages/alecrabbit/php-cli-snake)

[![Latest Stable Version](https://poser.pugx.org/alecrabbit/php-cli-snake/v/stable)](https://packagist.org/packages/alecrabbit/php-cli-snake)
[![Packagist Pre Release Version](https://img.shields.io/packagist/vpre/alecrabbit/php-cli-snake)](https://packagist.org/packages/alecrabbit/php-cli-snake)
[![Latest Unstable Version](https://poser.pugx.org/alecrabbit/php-cli-snake/v/unstable)](https://packagist.org/packages/alecrabbit/php-cli-snake)

[![License](https://img.shields.io/packagist/l/alecrabbit/php-cli-snake)](https://packagist.org/packages/alecrabbit/php-cli-snake)


![advanced](docs/images/fpdemo.svg)

### Zero dependencies

```
"require": {
  "php": "^7.3 || ^8.0"
}
```

### Installation

```bash
$ composer require alecrabbit/php-cli-snake
```

### Quickstart

```php
require_once __DIR__ . '/../vendor/autoload.php';

use AlecRabbit\Snake\Spinner;
use React\EventLoop\Factory;

$s = new Spinner();

$loop = Factory::create();

$loop->addPeriodicTimer($s->interval(), static function () use ($s) {
    $s->spin();
});

$s->begin();

$loop->run();

$s->end();
```

### Usage
 
 See [examples](./examples)
 
### Feature comparision

| Feature       | [php-console-spinner](https://github.com/alecrabbit/php-console-spinner)    |  [php-cli-snake](https://github.com/alecrabbit/php-cli-snake) |
| ------------- | :---:  | :---: |
| Lightweight        |  ❌ ️ |  ✔️  |
| Has zero dependencies      |  ❌ ️ |  ✔️  |
| Highly  configurable        |  ✔️ ️ |  ❌  |
| Contains various spinner classes        |  ✔️ ️ |  ❌  |
| Progress indicator        |  ✔️ ️ |  ❌  |
| Messages indicator        |  ✔️ ️ |  ❌  |
| Color settings for spinner       |  ✔️ ️ |  ❌  |
| Color settings for messages        |  ✔️ ️ |  ❌  |
| Color settings for progress indicator        |  ✔️ ️ |  ❌  |
| Has `disable()` method        |  ✔️ ️ |  ❌  |
| Has `enable()` method        |  ✔️ ️ |  ❌  |
| Can show final message      |  ✔️ ️ |  ❌  |
| Cursor hide can be disabled      |  ✔️ ️ |  ❌  |
| Can use optional custom output      |  ✔️ ️ |  ❌  |
| Has `erase()` method        |  ✔️ ️ |  ✔️ ️ |
| Hides cursor with `$spinner->begin()`  |  ✔️ ️ |  ✔️ ️ |
| Shows cursor with `$spinner->end()`  |  ✔️ ️ |  ✔️ ️ |
| Supports piping         |  ✔️ ️ |  ✔️ ️ |
| Supports redirect        |  ✔️ ️ |  ✔️ ️ |
| Supports `no color` mode        |  ✔️ ️ |  ✔️ ️ |
| Supports `16 color` mode        |  ✔️ ️ |  ✔️ ️ |
| Supports `256 color` mode        |  ✔️ ️ |  ✔️ ️ |

