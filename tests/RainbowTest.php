<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Rainbow\Rainbow;

class RainbowTest extends TestCase
{
    public function testHexForeground()
    {
        $rainbow = new Rainbow();
        $rainbow("Hello world");
        $this->assertSame("\033[38;2;255;255;255mHello world", $rainbow->hex("#ffffff")->output());
    }
}
