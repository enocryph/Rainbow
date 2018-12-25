<?php


namespace Tests;

use Rainbow\Exception\InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Rainbow\Exception\InvalidColorException;
use Rainbow\Exception\InvalidCommandException;
use Rainbow\Rainbow;

class BaseRainbowTest extends TestCase
{
    public function testForegroundColor()
    {
        $rainbow = new Rainbow();
        $this->assertSame("\033[30mHello World", $rainbow("Hello World")->foreground("black")->output());
        $this->assertSame("\033[31mHello World", $rainbow("Hello World")->foreground("red")->output());
        $this->assertSame("\033[32mHello World", $rainbow("Hello World")->foreground("green")->output());
        $this->assertSame("\033[33mHello World", $rainbow("Hello World")->foreground("yellow")->output());
        $this->assertSame("\033[34mHello World", $rainbow("Hello World")->foreground("blue")->output());
        $this->assertSame("\033[35mHello World", $rainbow("Hello World")->foreground("magenta")->output());
        $this->assertSame("\033[36mHello World", $rainbow("Hello World")->foreground("cyan")->output());
        $this->assertSame("\033[37mHello World", $rainbow("Hello World")->foreground("white")->output());
        $this->assertSame("\033[90mHello World", $rainbow("Hello World")->foreground("brightBlack")->output());
        $this->assertSame("\033[91mHello World", $rainbow("Hello World")->foreground("brightRed")->output());
        $this->assertSame("\033[92mHello World", $rainbow("Hello World")->foreground("brightGreen")->output());
        $this->assertSame("\033[93mHello World", $rainbow("Hello World")->foreground("brightYellow")->output());
        $this->assertSame("\033[94mHello World", $rainbow("Hello World")->foreground("brightBlue")->output());
        $this->assertSame("\033[95mHello World", $rainbow("Hello World")->foreground("brightMagenta")->output());
        $this->assertSame("\033[96mHello World", $rainbow("Hello World")->foreground("brightCyan")->output());
        $this->assertSame("\033[97mHello World", $rainbow("Hello World")->foreground("brightWhite")->output());
    }

    public function testBackGroundColor()
    {
        $rainbow = new Rainbow();
        $this->assertSame("\033[40mHello World", $rainbow("Hello World")->background("black")->output());
        $this->assertSame("\033[41mHello World", $rainbow("Hello World")->background("red")->output());
        $this->assertSame("\033[42mHello World", $rainbow("Hello World")->background("green")->output());
        $this->assertSame("\033[43mHello World", $rainbow("Hello World")->background("yellow")->output());
        $this->assertSame("\033[44mHello World", $rainbow("Hello World")->background("blue")->output());
        $this->assertSame("\033[45mHello World", $rainbow("Hello World")->background("magenta")->output());
        $this->assertSame("\033[46mHello World", $rainbow("Hello World")->background("cyan")->output());
        $this->assertSame("\033[47mHello World", $rainbow("Hello World")->background("white")->output());
        $this->assertSame("\033[100mHello World", $rainbow("Hello World")->background("brightBlack")->output());
        $this->assertSame("\033[101mHello World", $rainbow("Hello World")->background("brightRed")->output());
        $this->assertSame("\033[102mHello World", $rainbow("Hello World")->background("brightGreen")->output());
        $this->assertSame("\033[103mHello World", $rainbow("Hello World")->background("brightYellow")->output());
        $this->assertSame("\033[104mHello World", $rainbow("Hello World")->background("brightBlue")->output());
        $this->assertSame("\033[105mHello World", $rainbow("Hello World")->background("brightMagenta")->output());
        $this->assertSame("\033[106mHello World", $rainbow("Hello World")->background("brightCyan")->output());
        $this->assertSame("\033[107mHello World", $rainbow("Hello World")->background("brightWhite")->output());
    }

    public function testRgbColors()
    {
        $rainbow = new Rainbow();
        $this->assertSame("\033[38;2;192;168;17mHello World", $rainbow("Hello World")->rgb(192, 168, 17)->output());
        $this->assertSame("\033[48;2;192;168;17mHello World", $rainbow("Hello World")->backgroundRgb(192, 168, 17)->output());
        $this->assertSame("\033[48;2;192;168;17mHello World", $rainbow("Hello World")->bgRgb(192, 168, 17)->output());
    }

    public function testRgbOverride()
    {
        $rainbow = new Rainbow(true);

        $this->assertSame("\033[38;2;1;1;1mHello World", $rainbow("Hello World")->foreground("black")->output());
        $this->assertSame("\033[38;2;222;56;43mHello World", $rainbow("Hello World")->foreground("red")->output());
        $this->assertSame("\033[38;2;57;181;74mHello World", $rainbow("Hello World")->foreground("green")->output());
        $this->assertSame("\033[38;2;255;199;6mHello World", $rainbow("Hello World")->foreground("yellow")->output());
        $this->assertSame("\033[38;2;0;111;184mHello World", $rainbow("Hello World")->foreground("blue")->output());
        $this->assertSame("\033[38;2;118;38;113mHello World", $rainbow("Hello World")->foreground("magenta")->output());
        $this->assertSame("\033[38;2;44;181;223mHello World", $rainbow("Hello World")->foreground("cyan")->output());
        $this->assertSame("\033[38;2;204;204;204mHello World", $rainbow("Hello World")->foreground("white")->output());
        $this->assertSame("\033[38;2;128;128;128mHello World", $rainbow("Hello World")->foreground("brightBlack")->output());
        $this->assertSame("\033[38;2;255;0;0mHello World", $rainbow("Hello World")->foreground("brightRed")->output());
        $this->assertSame("\033[38;2;0;255;0mHello World", $rainbow("Hello World")->foreground("brightGreen")->output());
        $this->assertSame("\033[38;2;255;255;0mHello World", $rainbow("Hello World")->foreground("brightYellow")->output());
        $this->assertSame("\033[38;2;0;0;255mHello World", $rainbow("Hello World")->foreground("brightBlue")->output());
        $this->assertSame("\033[38;2;255;0;255mHello World", $rainbow("Hello World")->foreground("brightMagenta")->output());
        $this->assertSame("\033[38;2;0;255;255mHello World", $rainbow("Hello World")->foreground("brightCyan")->output());
        $this->assertSame("\033[38;2;255;255;255mHello World", $rainbow("Hello World")->foreground("brightWhite")->output());
        $this->assertSame("\033[48;2;1;1;1mHello World", $rainbow("Hello World")->background("black")->output());
        $this->assertSame("\033[48;2;222;56;43mHello World", $rainbow("Hello World")->background("red")->output());
        $this->assertSame("\033[48;2;57;181;74mHello World", $rainbow("Hello World")->background("green")->output());
        $this->assertSame("\033[48;2;255;199;6mHello World", $rainbow("Hello World")->background("yellow")->output());
        $this->assertSame("\033[48;2;0;111;184mHello World", $rainbow("Hello World")->background("blue")->output());
        $this->assertSame("\033[48;2;118;38;113mHello World", $rainbow("Hello World")->background("magenta")->output());
        $this->assertSame("\033[48;2;44;181;223mHello World", $rainbow("Hello World")->background("cyan")->output());
        $this->assertSame("\033[48;2;204;204;204mHello World", $rainbow("Hello World")->background("white")->output());
        $this->assertSame("\033[48;2;128;128;128mHello World", $rainbow("Hello World")->background("brightBlack")->output());
        $this->assertSame("\033[48;2;255;0;0mHello World", $rainbow("Hello World")->background("brightRed")->output());
        $this->assertSame("\033[48;2;0;255;0mHello World", $rainbow("Hello World")->background("brightGreen")->output());
        $this->assertSame("\033[48;2;255;255;0mHello World", $rainbow("Hello World")->background("brightYellow")->output());
        $this->assertSame("\033[48;2;0;0;255mHello World", $rainbow("Hello World")->background("brightBlue")->output());
        $this->assertSame("\033[48;2;255;0;255mHello World", $rainbow("Hello World")->background("brightMagenta")->output());
        $this->assertSame("\033[48;2;0;255;255mHello World", $rainbow("Hello World")->background("brightCyan")->output());
        $this->assertSame("\033[48;2;255;255;255mHello World", $rainbow("Hello World")->background("brightWhite")->output());
    }

    public function testInvalidColor()
    {
        $rainbow = new Rainbow();
        $this->expectException(InvalidColorException::class);
        $rainbow->background("nvm");
    }

    public function testAliases()
    {
        $rainbow = new Rainbow();
        $this->assertSame("\033[30mHello World", $rainbow("Hello World")->foreground("black")->output());
        $this->assertSame("\033[31mHello World", $rainbow("Hello World")->fg("red")->output());
        $this->assertSame("\033[40mHello World", $rainbow("Hello World")->background("black")->output());
        $this->assertSame("\033[41mHello World", $rainbow("Hello World")->bg("red")->output());
    }

    public function testMagicCall()
    {
        $rainbow = new Rainbow();
        $this->assertSame("\033[5mHello World", $rainbow("Hello World")->blink()->output());
        $this->assertSame("\033[25m\033[5mHello World", $rainbow("Hello World")->blink()->resetBlink()->output());
        $this->assertSame("\033[5mHello World", $rainbow("Hello World")->blink->output());
        $this->assertSame("\033[1m\033[5mHello World", $rainbow("Hello World")->blink->bold->output());

        $this->assertSame("\033[41mHello World", $rainbow("Hello World")->bgRed->output());
        $this->assertSame("\033[42mHello World", $rainbow("Hello World")->backgroundGreen->output());
        $this->assertSame("\033[31mHello World", $rainbow("Hello World")->fgRed->output());
        $this->assertSame("\033[91mHello World", $rainbow("Hello World")->brightRed->output());
        $this->assertSame("\033[103mHello World", $rainbow("Hello World")->backgroundBrightYellow->output());

        $this->expectException(InvalidArgumentException::class);
        $this->assertSame("\033[103mHello World", $rainbow("Hello World")->nvm->output());
    }

    public function testCommand()
    {
        $rainbow = new Rainbow();
        $this->expectException(InvalidCommandException::class);
        $rainbow("random")->command('nvm');
    }
}