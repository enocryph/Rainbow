<?php


namespace Rainbow;

use Rainbow\Exception\InvalidColorException;

/**
 * Class Rainbow
 * @package Rainbow
 */
class Rainbow extends BaseRainbow
{
    /**
     * @param $string
     * @return $this
     */
    public function __invoke($string)
    {
        $this->output = $string;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        if (!(strrpos($this->output, PHP_EOL) === 0)) {
            return $this->output . PHP_EOL;
        }
        return $this->output;
    }

    /**
     * Change foreground color with hex
     *
     * @param $color
     * @return mixed
     * @throws InvalidColorException
     */
    public function hex($color)
    {
        $this->hexIsValid($color);
        return call_user_func_array([$this, 'rgb'], $this->hexToRgb($color));
    }

    /**
     * Change background color with hex
     *
     * @param $color
     * @return mixed
     * @throws InvalidColorException
     */
    public function backgroundHex($color)
    {
        $this->hexIsValid($color);
        return call_user_func_array([$this, 'backgroundRgb'], $this->hexToRgb($color));
    }

    /**
     * Alias for backgroundHex
     *
     * @see Rainbow::backgroundHex()
     * @param $color
     * @return mixed
     */
    public function bgHex($color)
    {
        return call_user_func_array([$this, 'backgroundHex'], func_get_args());
    }

    /**
     * Check hex is valid
     *
     * @param $hexColor
     * @return bool
     * @throws InvalidColorException
     */
    protected function hexIsValid($hexColor)
    {
        preg_match('/#(?:[0-9a-fA-F]{6})/', $hexColor, $matches);

        if (empty($matches)) {
            throw new InvalidColorException("Invalid hex color: $hexColor");
        }

        return true;
    }

    /**
     * Convert hex to rgb
     *
     * @param $color
     * @return mixed
     */
    protected function hexToRgb($color)
    {
        return sscanf($color, "#%02x%02x%02x");
    }
}
