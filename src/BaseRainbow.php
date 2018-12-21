<?php


namespace Rainbow;

use Rainbow\Exception\InvalidColorException;
use Rainbow\Exception\InvalidCommandException;

/**
 * Class BaseRainbow
 * @package Rainbow
 */
abstract class BaseRainbow
{
    /**
     * Parameter that overrides default colors with rgb codes
     *
     * @var bool
     */
    protected $overrideTerminalColorsWithRgb;

    /**
     * Column of command names
     *
     * @var array
     */
    protected $commandNames = [];

    /**
     * Column of color names
     *
     * @var array
     */
    protected $colorNames = [];

    /**
     * Commands array
     *
     * @var array
     */
    protected $commands = [
        ['command' => 'reset', 'code' => '0'],
        ['command' => 'bold', 'code' => '1'],
        ['command' => 'faint', 'code' => '2'],
        ['command' => 'italic', 'code' => '3'],
        ['command' => 'underline', 'code' => '4'],
        ['command' => 'blink', 'code' => '5'],
        ['command' => 'reverse', 'code' => '7'],
        ['command' => 'conceal', 'code' => '8'],
        ['command' => 'crossed', 'code' => '9'],
        ['command' => 'fraktur', 'code' => '20'],
        ['command' => 'reset_bold_faint', 'code' => '22'],
        ['command' => 'reset_italic_fraktur', 'code' => '23'],
        ['command' => 'reset_underline', 'code' => '24'],
        ['command' => 'reset_blink', 'code' => '25'],
        ['command' => 'reset_inverse', 'code' => '26'],
        ['command' => 'reset_conceal', 'code' => '28'],
        ['command' => 'reset_crossed', 'code' => '29'],
        ['command' => 'reset_foreground_color', 'code' => '39'],
        ['command' => 'reset_background_color', 'code' => '49'],
    ];

    /**
     * Colors array
     *
     * @var array
     */
    protected $colors = [
        ['color' => 'black', 'code' => '0', 'rgb' => '1,1,1'],
        ['color' => 'red', 'code' => '1', 'rgb' => '222,56,43'],
        ['color' => 'green', 'code' => '2', 'rgb' => '57,181,74'],
        ['color' => 'yellow', 'code' => '3', 'rgb' => '255,199,6'],
        ['color' => 'blue', 'code' => '4', 'rgb' => '0,111,184'],
        ['color' => 'magenta', 'code' => '5', 'rgb' => '118,38,113'],
        ['color' => 'cyan', 'code' => '6', 'rgb' => '44,181,223'],
        ['color' => 'white', 'code' => '7', 'rgb' => '204,204,204'],
        ['color' => 'brightBlack', 'code' => '0', 'rgb' => '128,128,128'],
        ['color' => 'brightRed', 'code' => '1', 'rgb' => '255,0,0'],
        ['color' => 'brightGreen', 'code' => '2', 'rgb' => '0,255,0'],
        ['color' => 'brightYellow', 'code' => '3', 'rgb' => '255,255,0'],
        ['color' => 'brightBlue', 'code' => '4', 'rgb' => '0,0,255'],
        ['color' => 'brightMagenta', 'code' => '5', 'rgb' => '255,0,255'],
        ['color' => 'brightCyan', 'code' => '6', 'rgb' => '0,255,255'],
        ['color' => 'brightWhite', 'code' => '7', 'rgb' => '255,255,255']
    ];

    const FOREGROUND = ['normal' => 30, 'bright' => 90, 'rgb' => '38;2'];

    const BACKGROUND = ['normal' => 40, 'bright' => 100, 'rgb' => '48;2'];

    const FOREGROUND_TYPE = 'FOREGROUND';

    const BACKGROUND_TYPE = 'BACKGROUND';

    const FOREGROUND_RGB_TYPE = 'FOREGROUND_RGB';

    const BACKGROUND_RGB_TYPE = 'BACKGROUND_RGB';

    const ESCAPE_SEQUENCE = "\033[%sm";

    /**
     * User string
     *
     * @var $output string
     */
    protected $output;

    /**
     * BaseRainbow constructor.
     * @param bool $overrideTerminalColorsWithRgb
     */
    public function __construct($overrideTerminalColorsWithRgb = false)
    {
        $this->overrideTerminalColorsWithRgb = $overrideTerminalColorsWithRgb;
        $this->colorNames = array_column($this->colors, "color");
        $this->commandNames = array_column($this->commands, "command");
    }

    /**
     * Set foreground color by name
     *
     * @param $color
     * @return $this
     * @throws InvalidColorException
     */
    public function foreground($color)
    {
        $this->colorIsValid($color);
        $type = self::FOREGROUND_TYPE;
        $this->proceedColor($type, $color);
        return $this;
    }

    /**
     * Set background color by name
     *
     * @param $color
     * @return $this
     * @throws InvalidColorException
     */
    public function background($color)
    {
        $this->colorIsValid($color);
        $type = self::BACKGROUND_TYPE;
        $this->proceedColor($type, $color);
        return $this;
    }

    /**
     * Alias for foreground method
     *
     * @see BaseRainbow::foreground()
     * @param $color
     * @return mixed
     */
    public function fg($color)
    {
        return call_user_func_array([$this, 'foreground'], func_get_args());
    }

    /**
     * Alias for background method
     *
     * @see BaseRainbow::background()
     * @param $color
     * @return mixed
     */
    public function bg($color)
    {
        return call_user_func_array([$this, 'background'], func_get_args());
    }

    /**
     * Set foreground color with rgb
     *
     * @param $red
     * @param $green
     * @param $blue
     * @return $this
     */
    public function rgb($red, $green, $blue)
    {
        $this->rgbIsValid($red, $green, $blue);
        $type = self::FOREGROUND_RGB_TYPE;
        $this->proceedRgbColor($type, $red, $green, $blue);
        return $this;
    }

    /**
     * Set background color with rgb
     *
     * @param $red
     * @param $green
     * @param $blue
     * @return $this
     */
    public function backgroundRgb($red, $green, $blue)
    {
        $this->rgbIsValid($red, $green, $blue);
        $type = self::BACKGROUND_RGB_TYPE;
        $this->proceedRgbColor($type, $red, $green, $blue);
        return $this;
    }

    /**
     * Alias for backgroundRgb method
     *
     * @see BaseRainbow::backgroundRgb()
     * @param $red
     * @param $green
     * @param $blue
     * @return mixed
     */
    public function bgRgb($red, $green, $blue)
    {
        return call_user_func_array([$this, 'backgroundRgb'], func_get_args());
    }

    /**
     * Proceed color
     *
     * @param $type
     * @param $colorName
     * @return $this|mixed
     * @throws InvalidColorException
     */
    protected function proceedColor($type, $colorName)
    {
        $color = $this->getColor($colorName);

        if ($this->overrideTerminalColorsWithRgb) {
            if ($type === self::FOREGROUND_TYPE) {
                return call_user_func_array([$this, 'rgb'], explode(',', $color['rgb']));
            } else {
                return call_user_func_array([$this, 'backgroundRgb'], explode(',', $color['rgb']));
            }
        }

        $code = $this->getColorCode($type, $color);
        $this->output = sprintf($this::ESCAPE_SEQUENCE, $code) . $this->output;
        return $this;
    }

    /**
     * Proceed rgb color
     *
     * @param $type
     * @param $red
     * @param $green
     * @param $blue
     * @return $this
     */
    protected function proceedRgbColor($type, $red, $green, $blue)
    {
        $code = $this->getRgbColorCode($type, $red, $green, $blue);
        $this->output = sprintf($this::ESCAPE_SEQUENCE, $code) . $this->output;
        return $this;
    }

    /**
     * Returns command from $commands array
     *
     * @param $commandName
     * @return mixed
     * @throws InvalidCommandException
     */
    protected function getCommand($commandName)
    {
        if (is_numeric($key = array_search($commandName, $this->commandNames))) {
            return $this->commands[$key];
        } else {
            throw new InvalidCommandException("Invalid command: {$commandName}");
        }
    }

    /**
     * Returns color from $colors array
     *
     * @param $colorName
     * @return mixed
     * @throws InvalidColorException
     */
    protected function getColor($colorName)
    {
        if (is_numeric($key = array_search($colorName, $this->colorNames))) {
            return $this->colors[$key];
        } else {
            throw new InvalidColorException("Invalid command: {$colorName}");
        }
    }

    /**
     * Check rgb is valid
     *
     * @param $red
     * @param $green
     * @param $blue
     * @return bool
     */
    protected function rgbIsValid($red, $green, $blue)
    {
        foreach (func_get_args() as $color) {
            if ($color < 0 || $color > 255) {
                return false;
            }
        }
        return true;
    }

    /**
     * Check color is valid
     *
     * @param $color
     * @return bool
     */
    protected function colorIsValid($color)
    {
        return in_array($color, $this->colorNames);
    }

    /**
     * Checks color is bright or not
     *
     * @param $color
     * @return bool
     */
    protected function colorIsBright($color)
    {
        return is_numeric(strpos($color['color'], 'bright'));
    }

    /**
     * Returns color code
     *
     * @param $type
     * @param $color
     * @return mixed
     */
    protected function getColorCode($type, $color)
    {
        if ($type === self::FOREGROUND_TYPE) {
            $base = self::FOREGROUND;
        } else {
            $base = self::BACKGROUND;
        }

        if ($this->colorIsBright($color)) {
            $code = $base['bright'];
        } else {
            $code = $base['normal'];
        }

        $code += $color['code'];

        return $code;
    }

    /**
     * Returns rgb color code
     *
     * @param $type
     * @param $red
     * @param $green
     * @param $blue
     * @return string
     */
    protected function getRgbColorCode($type, $red, $green, $blue)
    {
        if ($type === self::FOREGROUND_RGB_TYPE) {
            $base = self::FOREGROUND;
        } else {
            $base = self::BACKGROUND;
        }

        $code = "{$base['rgb']};{$red};{$green};{$blue}";

        return $code;
    }
}
