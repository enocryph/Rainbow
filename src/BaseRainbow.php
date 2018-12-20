<?php


namespace Rainbow;

/**
 * Class Rainbow
 * @package Rainbow
 *
 * @method $this reset()
 * @method $this bold()
 * @method $this faint()
 * @method $this italic()
 * @method $this underline()
 * @method $this blink()
 * @method $this rapidBlink()
 * @method $this reverse()
 * @method $this conceal()
 * @method $this default()
 * @method $this black()
 * @method $this red()
 * @method $this green()
 * @method $this yellow()
 * @method $this blue()
 * @method $this magenta()
 * @method $this cyan()
 * @method $this light_gray()
 * @method $this dark_gray()
 * @method $this light_red()
 * @method $this light_green()
 * @method $this light_yellow()
 * @method $this light_blue()
 * @method $this light_magenta()
 * @method $this light_cyan()
 * @method $this white()
 * @method $this background_default()
 * @method $this background_black()
 * @method $this background_red()
 * @method $this background_green()
 * @method $this background_yellow()
 * @method $this background_blue()
 * @method $this background_magenta()
 * @method $this background_cyan()
 * @method $this background_light_gray()
 * @method $this background_dark_gray()
 * @method $this background_light_red()
 * @method $this background_light_green()
 * @method $this background_light_yellow()
 * @method $this background_light_blue()
 * @method $this background_light_magenta()
 * @method $this background_light_cyan()
 * @method $this background_white()
 * @method $this bg_default()
 * @method $this bg_black()
 * @method $this bg_red()
 * @method $this bg_green()
 * @method $this bg_yellow()
 * @method $this bg_blue()
 * @method $this bg_magenta()
 * @method $this bg_cyan()
 * @method $this bg_light_gray()
 * @method $this bg_dark_gray()
 * @method $this bg_light_red()
 * @method $this bg_light_green()
 * @method $this bg_light_yellow()
 * @method $this bg_light_blue()
 * @method $this bg_light_magenta()
 * @method $this bg_light_cyan()
 * @method $this bg_white()
 * @property $this reset
 * @property $this bold
 * @property $this faint
 * @property $this italic
 * @property $this underline
 * @property $this blink
 * @property $this rapidBlink
 * @property $this reverse
 * @property $this conceal
 * @property $this default
 * @property $this black
 * @property $this red
 * @property $this green
 * @property $this yellow
 * @property $this blue
 * @property $this magenta
 * @property $this cyan
 * @property $this light_gray
 * @property $this dark_gray
 * @property $this light_red
 * @property $this light_green
 * @property $this light_yellow
 * @property $this light_blue
 * @property $this light_magenta
 * @property $this light_cyan
 * @property $this white
 * @property $this background_default
 * @property $this background_black
 * @property $this background_red
 * @property $this background_green
 * @property $this background_yellow
 * @property $this background_blue
 * @property $this background_magenta
 * @property $this background_cyan
 * @property $this background_light_gray
 * @property $this background_dark_gray
 * @property $this background_light_red
 * @property $this background_light_green
 * @property $this background_light_yellow
 * @property $this background_light_blue
 * @property $this background_light_magenta
 * @property $this background_light_cyan
 * @property $this background_white
 * @property $this bg_default
 * @property $this bg_black
 * @property $this bg_red
 * @property $this bg_green
 * @property $this bg_yellow
 * @property $this bg_blue
 * @property $this bg_magenta
 * @property $this bg_cyan
 * @property $this bg_light_gray
 * @property $this bg_dark_gray
 * @property $this bg_light_red
 * @property $this bg_light_green
 * @property $this bg_light_yellow
 * @property $this bg_light_blue
 * @property $this bg_light_magenta
 * @property $this bg_light_cyan
 * @property $this bg_white
 */
abstract class BaseRainbow
{
    /**
     * Input string
     * @var string
     */
    protected $string;

    /**
     * ASCII Escape Sequence
     */
    const ESCAPE_SEQUENCE = "\033[%sm";

    /**
     * Array of graphic rendition
     * @var array
     */
    protected $graphicRendition = [
        'reset' => '0',
        'bold' => '1',
        'faint' => '2',
        'italic' => '3',
        'underline' => '4',
        'blink' => '5',
        'rapidBlink' => '6',
        'reverse' => '7',
        'conceal' => '8',
        'black' => '30',
        'red' => '31',
        'green' => '32',
        'yellow' => '33',
        'blue' => '34',
        'magenta' => '35',
        'cyan' => '36',
        'light_gray' => '37',
        'default' => '39',
        'dark_gray' => '90',
        'light_red' => '91',
        'light_green' => '92',
        'light_yellow' => '93',
        'light_blue' => '94',
        'light_magenta' => '95',
        'light_cyan' => '96',
        'white' => '97',
        'background_black' => '40',
        'background_red' => '41',
        'background_green' => '42',
        'background_yellow' => '43',
        'background_blue' => '44',
        'background_magenta' => '45',
        'background_cyan' => '46',
        'background_light_gray' => '47',
        'background_default' => '49',
        'background_dark_gray' => '100',
        'background_light_red' => '101',
        'background_light_green' => '102',
        'background_light_yellow' => '103',
        'background_light_blue' => '104',
        'background_light_magenta' => '105',
        'background_light_cyan' => '106',
        'background_white' => '107',
    ];

    public function background(string $color): self
    {
        $color = $this->formatMagicCallArgument("background_{$color}");
        return $this->buildSequence($this->graphicRendition[$color]);
    }

    public function foreground(string $color): self
    {
        $color  = $this->formatMagicCallArgument($color);
        return $this->buildSequence($this->graphicRendition[$color]);
    }

    /**
     * @param $name
     * @param $arguments
     * @return $this
     */
    public function __call($name, $arguments)
    {
        $name = $this->formatMagicCallArgument($name);
        return $this->buildSequence($this->graphicRendition[$name]);
    }

    public function __get($name)
    {
        $name = $this->formatMagicCallArgument($name);
        return $this->buildSequence($this->graphicRendition[$name]);
    }

    /**
     * @param $string
     * @return $this
     */
    public function __invoke($string)
    {
        $this->string = $string;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->string . sprintf($this::ESCAPE_SEQUENCE, 0);
    }

    /**
     * @param $argument
     * @return mixed
     */
    protected function formatMagicCallArgument($argument)
    {
        if (is_numeric(strpos($argument, 'bg_'))) {
            $argument = str_replace('bg_', 'background_', $argument);
        }
        return $argument;
    }

    /**
     * @param $style
     * @return $this
     */
    protected function buildSequence($style)
    {
        $this->string = sprintf($this::ESCAPE_SEQUENCE, $style) . $this->string;
        return $this;
    }
}
