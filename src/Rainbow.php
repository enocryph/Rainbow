<?php


namespace Rainbow;

use Rainbow\Exception\InvalidArgumentException;
use Rainbow\Exception\InvalidColorException;

/**
 * Class Rainbow
 * @package Rainbow
 * @method $this black
 * @method $this red
 * @method $this green
 * @method $this yellow
 * @method $this blue
 * @method $this magenta
 * @method $this cyan
 * @method $this white
 * @method $this brightBlack
 * @method $this brightRed
 * @method $this brightGreen
 * @method $this brightYellow
 * @method $this brightBlue
 * @method $this brightMagenta
 * @method $this brightCyan
 * @method $this brightWhite
 * @method $this fgBlack
 * @method $this fgRed
 * @method $this fgGreen
 * @method $this fgYellow
 * @method $this fgBlue
 * @method $this fgMagenta
 * @method $this fgCyan
 * @method $this fgWhite
 * @method $this fgBrightBlack
 * @method $this fgBrightRed
 * @method $this fgBrightGreen
 * @method $this fgBrightYellow
 * @method $this fgBrightBlue
 * @method $this fgBrightMagenta
 * @method $this fgBrightCyan
 * @method $this fgBrightWhite
 * @method $this foregroundBlack
 * @method $this foregroundRed
 * @method $this foregroundGreen
 * @method $this foregroundYellow
 * @method $this foregroundBlue
 * @method $this foregroundMagenta
 * @method $this foregroundCyan
 * @method $this foregroundWhite
 * @method $this foregroundBrightBlack
 * @method $this foregroundBrightRed
 * @method $this foregroundBrightGreen
 * @method $this foregroundBrightYellow
 * @method $this foregroundBrightBlue
 * @method $this foregroundBrightMagenta
 * @method $this foregroundBrightCyan
 * @method $this foregroundBrightWhite
 * @method $this bgBlack
 * @method $this bgRed
 * @method $this bgGreen
 * @method $this bgYellow
 * @method $this bgBlue
 * @method $this bgMagenta
 * @method $this bgCyan
 * @method $this bgWhite
 * @method $this bgBrightBlack
 * @method $this bgBrightRed
 * @method $this bgBrightGreen
 * @method $this bgBrightYellow
 * @method $this bgBrightBlue
 * @method $this bgBrightMagenta
 * @method $this bgBrightCyan
 * @method $this bgBrightWhite
 * @method $this backgroundBlack
 * @method $this backgroundRed
 * @method $this backgroundGreen
 * @method $this backgroundYellow
 * @method $this backgroundBlue
 * @method $this backgroundMagenta
 * @method $this backgroundCyan
 * @method $this backgroundWhite
 * @method $this backgroundBrightBlack
 * @method $this backgroundBrightRed
 * @method $this backgroundBrightGreen
 * @method $this backgroundBrightYellow
 * @method $this backgroundBrightBlue
 * @method $this backgroundBrightMagenta
 * @method $this backgroundBrightCyan
 * @method $this backgroundBrightWhite
 * @method $this reset
 * @method $this bold
 * @method $this faint
 * @method $this italic
 * @method $this underline
 * @method $this blink
 * @method $this reverse
 * @method $this conceal
 * @method $this crossed
 * @method $this fraktur
 * @method $this resetBoldFaint
 * @method $this resetItalicFraktur
 * @method $this resetUnderline
 * @method $this resetBlink
 * @method $this resetInverse
 * @method $this resetConceal
 * @method $this resetCrossed
 * @method $this resetForegroundColor
 * @method $this resetBackgroundColor
 * @property $this black
 * @property $this red
 * @property $this green
 * @property $this yellow
 * @property $this blue
 * @property $this magenta
 * @property $this cyan
 * @property $this white
 * @property $this brightBlack
 * @property $this brightRed
 * @property $this brightGreen
 * @property $this brightYellow
 * @property $this brightBlue
 * @property $this brightMagenta
 * @property $this brightCyan
 * @property $this brightWhite
 * @property $this fgBlack
 * @property $this fgRed
 * @property $this fgGreen
 * @property $this fgYellow
 * @property $this fgBlue
 * @property $this fgMagenta
 * @property $this fgCyan
 * @property $this fgWhite
 * @property $this fgBrightBlack
 * @property $this fgBrightRed
 * @property $this fgBrightGreen
 * @property $this fgBrightYellow
 * @property $this fgBrightBlue
 * @property $this fgBrightMagenta
 * @property $this fgBrightCyan
 * @property $this fgBrightWhite
 * @property $this foregroundBlack
 * @property $this foregroundRed
 * @property $this foregroundGreen
 * @property $this foregroundYellow
 * @property $this foregroundBlue
 * @property $this foregroundMagenta
 * @property $this foregroundCyan
 * @property $this foregroundWhite
 * @property $this foregroundBrightBlack
 * @property $this foregroundBrightRed
 * @property $this foregroundBrightGreen
 * @property $this foregroundBrightYellow
 * @property $this foregroundBrightBlue
 * @property $this foregroundBrightMagenta
 * @property $this foregroundBrightCyan
 * @property $this foregroundBrightWhite
 * @property $this bgBlack
 * @property $this bgRed
 * @property $this bgGreen
 * @property $this bgYellow
 * @property $this bgBlue
 * @property $this bgMagenta
 * @property $this bgCyan
 * @property $this bgWhite
 * @property $this bgBrightBlack
 * @property $this bgBrightRed
 * @property $this bgBrightGreen
 * @property $this bgBrightYellow
 * @property $this bgBrightBlue
 * @property $this bgBrightMagenta
 * @property $this bgBrightCyan
 * @property $this bgBrightWhite
 * @property $this backgroundBlack
 * @property $this backgroundRed
 * @property $this backgroundGreen
 * @property $this backgroundYellow
 * @property $this backgroundBlue
 * @property $this backgroundMagenta
 * @property $this backgroundCyan
 * @property $this backgroundWhite
 * @property $this backgroundBrightBlack
 * @property $this backgroundBrightRed
 * @property $this backgroundBrightGreen
 * @property $this backgroundBrightYellow
 * @property $this backgroundBrightBlue
 * @property $this backgroundBrightMagenta
 * @property $this backgroundBrightCyan
 * @property $this backgroundBrightWhite
 * @property $this reset
 * @property $this bold
 * @property $this faint
 * @property $this italic
 * @property $this underline
 * @property $this blink
 * @property $this reverse
 * @property $this conceal
 * @property $this crossed
 * @property $this fraktur
 * @property $this resetBoldFaint
 * @property $this resetItalicFraktur
 * @property $this resetUnderline
 * @property $this resetBlink
 * @property $this resetInverse
 * @property $this resetConceal
 * @property $this resetCrossed
 * @property $this resetForegroundColor
 * @property $this resetBackgroundColor
 */
class Rainbow extends BaseRainbow
{
    const ESCAPE_LINER_SEQUENCE = "\033[0G\033[2K";

    const TAGS_PATTERN = '/(<\s*\/?\s*)(\s*([^>]*)?\s*>)/i';

    /**
     * @var string
     */
    private $templateSequencePattern;

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
        if (!(strrpos($this->output, PHP_EOL) === strlen($this->output) - 1)) {
            return $this->output . PHP_EOL;
        }
        return $this->output;
    }

    /**
     * Change foreground color with hex
     *
     * @param $color
     * @return self
     * @throws InvalidColorException
     */
    public function hex($color)
    {
        $this->hexIsValid($color);
        call_user_func_array([$this, 'rgb'], $this->hexToRgb($color));
        return $this;
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
        preg_match('/^#?(?:[0-9a-fA-F]{6})$/', $hexColor, $matches);

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
        $color = ltrim($color, "#");
        return sscanf($color, "%02x%02x%02x");
    }

    /**
     * Returns string
     *
     * @return string
     */
    public function output()
    {
        return $this->output;
    }

    /**
     * Outputs string on the previous line
     *
     * @param $times
     * @param callable $callback ($this, $counter)
     * @return $this
     */
    public function liner($times, callable $callback)
    {
        for ($i = 1; $i <= $times; $i++) {
            $result = $callback($this, $i);
            echo self::ESCAPE_LINER_SEQUENCE . $result;

            if ($i === $times) {
                echo PHP_EOL;
            }
        }
        return $this;
    }

    /**
     * Add PHP_EOL to end of the string
     *
     * @return $this
     */
    public function newline()
    {
        $this->output = $this->output . PHP_EOL;
        return $this;
    }

    /**
     * Convert template with tags to ASCII sequence
     *
     * @param $template
     * @return $this
     */
    public function template($template)
    {
        $template = preg_replace_callback(self::TAGS_PATTERN, function ($matches) {
            list ($fullMatch, $entrance, $ending, $tag) = $matches;
            $type = null;

            if ($this->isHexTag($fullMatch) && $hexColor = $this->extractHexFromTag($tag)) {
                $rgb = $this->hexToRgb($hexColor);
            }

            if ($this->isRgbTag($fullMatch) && $rgb = $this->extractRgbFromTag($this->prepareMagicArgument($tag))) {
                $rgb = explode(";", $rgb);
            }

            if ($this->isBackgroundColor($tag)) {
                $type = isset($rgb) ? self::BACKGROUND_RGB_TYPE : self::BACKGROUND_TYPE;
            } elseif ($this->isColor($tag) || strpos($tag, 'rgb') === 0 || strpos($tag, 'hex') === 0) {
                $type = isset($rgb) ? self::FOREGROUND_RGB_TYPE : self::FOREGROUND_TYPE;
            } elseif ($this->isCommand($tag)) {
                $type = self::COMMAND_TYPE;
            }

            $isClosing = $this->isClosingTag($fullMatch);
            $sequence = $this->getSequenceByTagInfo($type, isset($rgb) ? $rgb : $tag, $isClosing);

            if ($isClosing) {
                return $sequence . $this->templateSequencePattern;
            }
            $output = $this->templateSequencePattern;
            return $output;
        }, $template);

        $this->templateSequencePattern = "";

        $this->output = $template;
        return $this;
    }

    /**
     * @param $tag
     * @return bool
     */
    protected function isRgbTag($tag)
    {
        return is_numeric(stripos($tag, "rgb"));
    }

    /**
     * @param $tag
     * @return bool
     */
    protected function isHexTag($tag)
    {
        return is_numeric(stripos($tag, "hex"));
    }

    /**
     * @param $tag
     * @return mixed
     */
    protected function extractHexFromTag($tag)
    {
        return str_ireplace('hex:', '', $tag);
    }

    /**
     * @param $tag
     * @return mixed
     */
    protected function extractRgbFromTag($tag)
    {
        return str_ireplace('rgb:', '', $tag);
    }

    /**
     * @param $tag
     * @return bool
     */
    protected function isClosingTag($tag)
    {
        return is_numeric(strpos($tag, '</'));
    }

    /**
     * @param $type
     * @param $argument
     * @param $isClosing
     * @return string
     * @throws Exception\InvalidCommandException
     * @throws InvalidArgumentException
     * @throws InvalidColorException
     */
    protected function getSequenceByTagInfo($type, $argument, $isClosing)
    {
        if ($isClosing) {
            $sequence = $this->getSequenceForClosingTag($type, $argument);
            $this->removeTemplateSequence();
        } else {
            if ($type === self::FOREGROUND_TYPE || $type === self::BACKGROUND_TYPE) {
                $argument = $this->prepareMagicArgument($argument);
                $color = $this->getColor($argument);
                $code = $this->getColorCode($type, $color);
            } elseif ($type === self::FOREGROUND_RGB_TYPE || $type === self::BACKGROUND_RGB_TYPE) {
                list ($red, $green, $blue) = $argument;
                $code = $this->getRgbColorCode($type, $red, $green, $blue);
            } elseif ($type === self::COMMAND_TYPE) {
                $code = $this->getCommandCode($argument);
            } else {
                throw new InvalidArgumentException("Unknown type {$type}");
            }

            $sequence = $this->buildSequence($code);
            $this->addTemplateSequence($sequence);
        }

        return $sequence;
    }

    /**
     * @param $type
     * @param $argument
     * @return string
     * @throws Exception\InvalidCommandException
     */
    protected function getSequenceForClosingTag($type, $argument)
    {
        if ($type === self::BACKGROUND_RGB_TYPE || $type === self::BACKGROUND_TYPE) {
            $code = $this->getCommandCode('resetBackgroundColor');
        } elseif ($type === self::FOREGROUND_RGB_TYPE || $type === self::FOREGROUND_TYPE) {
            $code = $this->getCommandCode('resetForegroundColor');
        } else {
            $code = $this->getCommandCode($argument, true);
        }

        return $this->buildSequence($code);
    }

    /**
     * @param $code
     * @return string
     */
    protected function buildSequence($code)
    {
        return sprintf(self::ESCAPE_SEQUENCE, $code);
    }

    /**
     * @param $sequence
     * @return $this
     */
    protected function addTemplateSequence($sequence)
    {
        $this->templateSequencePattern .= $sequence;
        return $this;
    }

    /**
     * @return $this
     */
    protected function removeTemplateSequence()
    {
        if (is_numeric(strrpos($this->templateSequencePattern, "\033"))) {
            $this->templateSequencePattern = substr($this->templateSequencePattern, 0, strrpos($this->templateSequencePattern, "\033"));
        }
        return $this;
    }
}
