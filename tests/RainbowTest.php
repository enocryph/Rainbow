<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Rainbow\Exception\InvalidArgumentException;
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

    public function testNewline()
    {
        $rainbow = new Rainbow();
        $this->assertSame("Hello world" . PHP_EOL, $rainbow("Hello world")->newline()->output());
    }

    public function testLiner()
    {
        $rainbow = new Rainbow();
        $rainbow->liner(2, function (\Rainbow\Rainbow $rainbow, $counter) {
            return $rainbow("Parsed $counter of 100")->red->output();
        });

        $this->expectOutputString("\033[0G\033[2K\033[31mParsed 1 of 100\033[0G\033[2K\033[31mParsed 2 of 100\n");
    }

    public function testTemplate()
    {
        $rainbow = new Rainbow();
        $template = "<yellow>Hello <white>Wo<blink>r</blink>ld</white></yellow>";
        $this->assertSame("\033[33mHello \033[33m\033[37mWo\033[33m\033[37m\033[5mr\033[25m\033[33m\033[37mld\033[39m\033[33m\033[39m", $rainbow->template($template)->output());
    }

    public function testTemplateRgbTags()
    {
        $rainbow = new Rainbow();
        $template = "<rgb:255;200;150>Hello</rgb>";
        $this->assertSame("\033[38;2;255;200;150mHello\033[39m", $rainbow->template($template)->output());

        $template .= "<backgroundRgb:255;199;150>Hello</backgroundRgb>";
        $this->assertSame("\033[38;2;255;200;150mHello\033[39m\033[48;2;255;199;150mHello\033[49m", $rainbow->template($template)->output());

        $template = "<rgb:255;200;150>He<backgroundRgb:255;199;150>ll</backgroundRgb>o</rgb>";
        $this->assertSame("\033[38;2;255;200;150mHe\033[38;2;255;200;150m\033[48;2;255;199;150mll\033[49m\033[38;2;255;200;150mo\033[39m", $rainbow->template($template)->output());
    }

    public function testTemplateHexTags()
    {
        $rainbow = new Rainbow();
        $template = "<hex:000000>Hello</hex>";
        $this->assertSame("\033[38;2;0;0;0mHello\033[39m", $rainbow->template($template)->output());
    }

    public function testTemplateInvalidTags()
    {
        $rainbow = new Rainbow();
        $template = "<nvm></nvm>";
        $this->expectException(InvalidArgumentException::class);
        $rainbow->template($template)->output();
    }
}
