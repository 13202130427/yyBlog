<?php


namespace App\Libraries\Markdown;

use app\Libraries\Markdown\Parser;

class Markdown
{
    protected $parser;

    public function __construct(Parser $parser)
    {
        $this->parser = $parser;
    }

    public function markdown($text)
    {
        $html = $this->parser->makeHtml($text);

        return $html;
    }
}
