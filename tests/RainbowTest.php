<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Rainbow\Exception\InvalidColorException;
use Rainbow\Rainbow;

class RainbowTest extends TestCase
{
    public function testHexForeground()
    {
        $rainbow = new Rainbow();
        $rainbow("Hello world");
        $this->assertSame("\033[38;2;255;255;255mHello world", $rainbow->hex("#ffffff")->output());
    }

    public function testHexBackground()
    {
        $rainbow = new Rainbow();
        $rainbow("Hello world");
        $this->assertSame("\033[48;2;255;255;255mHello world", $rainbow->backgroundHex("#ffffff")->output());
        $this->assertSame("\033[48;2;255;255;255mHello world", $rainbow("Hello world")->bgHex("#ffffff")->output());
    }

    public function testHexIsValid()
    {
        $rainbow = new Rainbow();
        $rainbow("Hello world");
        $this->expectException(InvalidColorException::class);
        $rainbow->hex("#gggggg");
    }

    public function testMagicToStringWithoutEOL()
    {
        $rainbow = new Rainbow();
        $rainbow("Hello world");
        $this->expectOutputString("Hello world" . PHP_EOL);
        echo $rainbow;
    }

    public function testMagicToStringWithEOL()
    {
        $rainbow = new Rainbow();
        $rainbow("Hello world" . PHP_EOL);
        $this->expectOutputString("Hello world" . PHP_EOL);
        echo $rainbow;
    }

    public function testMagicToStringEmpty()
    {
        $rainbow = new Rainbow();
        $rainbow("");
        $this->expectOutputString("" . PHP_EOL);
        echo $rainbow;
    }
}
