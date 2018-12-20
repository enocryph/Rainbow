<?php


namespace Rainbow;

class Rainbow extends BaseRainbow
{
    const TEMPLATE_REGEX = '/(<\s*\/?\s*)(\w+)(\s*([^>]*)?\s*>)/i';

    public function newline()
    {
        $this->string .= PHP_EOL;
        return $this;
    }

    public function render($template)
    {
        $template = preg_replace_callback(self::TEMPLATE_REGEX, function ($matches) {
            $name = $this->formatMagicCallArgument($matches[2]);
            $this->buildSequence($this->graphicRendition[$name]);
            return $this->string;
        }, $template);
        var_dump($template); exit;

// Print the entire match result
        var_dump($matches);
    }

}