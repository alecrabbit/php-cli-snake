# 🐍 PHP CLI Snake

## Lightweight cli spinner with zero dependencies

[![PHP Version](https://img.shields.io/packagist/php-v/alecrabbit/php-cli-snake.svg)](https://php.net)

<!-- [![Build Status](https://travis-ci.com/alecrabbit/php-cli-snake.svg?branch=master)](https://travis-ci.com/alecrabbit/php-cli-snake) -->
<!-- [![Appveyor Status](https://img.shields.io/appveyor/ci/alecrabbit/php-cli-snake.svg?label=appveyor)](https://ci.appveyor.com/project/alecrabbit/php-cli-snake/branch/master)-->
<!-- [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/alecrabbit/php-cli-snake/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/alecrabbit/php-cli-snake/?branch=master)-->
<!-- [![Code Coverage](https://scrutinizer-ci.com/g/alecrabbit/php-cli-snake/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/alecrabbit/php-cli-snake/?branch=master)-->
<!-- [![Total Downloads](https://poser.pugx.org/alecrabbit/php-cli-snake/downloads)](https://packagist.org/packages/alecrabbit/php-cli-snake)-->
<!-- -->
<!-- [![Latest Stable Version](https://poser.pugx.org/alecrabbit/php-cli-snake/v/stable)](https://packagist.org/packages/alecrabbit/php-cli-snake)-->
<!-- [![Latest Stable Version](https://img.shields.io/packagist/v/alecrabbit/php-cli-snake.svg)](https://packagist.org/packages/alecrabbit/php-cli-snake)-->
<!-- [![Latest Unstable Version](https://poser.pugx.org/alecrabbit/php-cli-snake/v/unstable)](https://packagist.org/packages/alecrabbit/php-cli-snake)-->

[![License](https://poser.pugx.org/alecrabbit/php-cli-snake/license)](https://packagist.org/packages/alecrabbit/php-cli-snake)

### Installation

```bash
$ composer require alecrabbit/php-cli-snake
```
### Features
- hides cursor on `$spinner->begin()`, shows on `$spinner->end()`
- supplied with `SymfonyOutputAdapter::class`


| Feature       | [php-console-spinner](https://github.com/alecrabbit/php-console-spinner)    |  [php-cli-snake](https://github.com/alecrabbit/php-cli-snake) |
| ------------- | :---:  | :---: |
| Highly  configurable        |  ✔  |  ❌  |
| Contains various spinner classes        |  ✔  |  ❌  |
| Progress indicator        |  ✔  |  ❌  |
| Messages indicator        |  ✔  |  ❌  |
| Color settings for spinner       |  ✔  |  ❌  |
| Color settings for messages        |  ✔  |  ❌  |
| Color settings for progress indicator        |  ✔  |  ❌  |
| Has `disable()` method        |  ✔  |  ❌  |
| Has `enable()` method        |  ✔  |  ❌  |
| Has `erase()` method        |  ✔  |  ✔  |
| Can show final message      |  ✔  |  ❌  |
| Hides cursor on `$spinner->begin()`  |  ✔  |  ✔  |
| Shows cursor on `$spinner->end()`  |  ✔  |  ✔  |
| Cursor hide can be disabled      |  ✔  |  ❌  |
| Supports piping         |  ✔  |  ✔  |
| Supports redirect        |  ✔  |  ✔  |
| Supports `no color`        | ✔   | ✔   |
| Supports `16 color`        | ✔   | ✔   |
| Supports `256 color`        | ✔   | ✔   |
