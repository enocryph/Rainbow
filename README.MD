# Rainbow

Pretty console output :)

[![Build Status](https://travis-ci.org/enocryph/Rainbow.svg?branch=master)](https://travis-ci.org/enocryph/Rainbow)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/enocryph/Rainbow/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/enocryph/Rainbow/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/enocryph/Rainbow/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/enocryph/Rainbow/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/enocryph/Rainbow/v/stable)](https://packagist.org/packages/enocryph/Rainbow)
[![License](https://poser.pugx.org/enocryph/Rainbow/license)](https://packagist.org/packages/enocryph/Rainbow)

# Contents
* [Examples](#examples)
* [Requirements](#requirements)
* [Installation](#installation)
* [Usage](#usage)
* [Colors](#colors)
* [Commands](#commands)

## Examples

```php
$rainbow = new Rainbow();   

echo $rainbow("Rainbow")->bold->white->bgBlack->reset;
echo $rainbow("Rainbow")->bold()->white()->bgBlack()->reset();
echo $rainbow("Rainbow")->command('bold')->foreground("white")->background("black")->command('reset');
```

![image](https://user-images.githubusercontent.com/21136581/50575602-6f3d4f80-0e12-11e9-9676-dbe39c8a63b4.png)

```php
$rainbow = new Rainbow();

echo $rainbow("Rainbow")->hex("#55FF55")->bgHex("#555555");
echo $rainbow("Rainbow")->rgb(85, 255, 85)->bgRgb(85, 85, 85);
```

![image](https://user-images.githubusercontent.com/21136581/50575608-7b291180-0e12-11e9-8484-4a924a95ca60.png)

```php
$rainbow = new Rainbow();

$template = "<bold><white><bgBlack>Rainbow</bgBlack></white></bold>";
echo $rainbow->template($template);
```

![image](https://user-images.githubusercontent.com/21136581/50575613-84b27980-0e12-11e9-9852-031579e74d7e.png)

```php
$rainbow = new Rainbow();

$template = "<hex:55FF55><bgHex:555555>Rainbow</bgHex:555555></hex:55FF55>";
echo $rainbow->template($template);
```

![image](https://user-images.githubusercontent.com/21136581/50575615-8bd98780-0e12-11e9-842a-4ec393684097.png)

```php
$rainbow = new Rainbow();

$template = "<rgb:85:255:85><bgRgb:85:85:85>Rainbow</bgRgb:85:85:85></rgb:85:255:85>";
echo $rainbow->template($template);
```

![image](https://user-images.githubusercontent.com/21136581/50575621-9eec5780-0e12-11e9-91ca-15e919e6f1ba.png)

## Requirements

* PHP `7.0` or higher

## Installation

The preferred way to install this package is to use [Composer][3]:

``` bash
$ composer require enocryph/rainbow
```

## Usage

Create instance of Rainbow class

```php
use Rainbow\Rainbow;
$rainbow = new Rainbow();
```

Use method [`output()`](#output) to get a output string

```php
$rainbow = new Rainbow();
echo $rainbow("Hello World")->output();
```

## Colors

Library supports default ASCII colors. [Check Wiki][4]

* black
* red
* green
* yellow
* blue
* magenta
* cyan
* white
* brightBlack
* brightRed
* brightGreen
* brightYellow
* brightBlue
* brightMagenta
* brightCyan
* brightWhite

you can change color like property or method call or via `fg()` `foreground()` `bg()` `background()`

add bg or background prefix to change background color

you can use color or fg or foreground methods to change foreground color

## Commands

* reset
* bold
* faint
* italic
* underline
* blink
* reverse
* conceal
* crossed
* fraktur
* resetBoldFaint
* resetItalicFraktur
* resetUnderline
* resetBlink
* resetInverse
* resetConceal
* resetCrossed
* resetForegroundColor
* resetBackgroundColor

you can run command like property or method call or via `command()`

[4]: https://en.wikipedia.org/wiki/ANSI_escape_code#Colors
[3]: https://getcomposer.org/