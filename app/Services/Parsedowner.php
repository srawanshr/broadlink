<?php
namespace App\Services;

use Parsedown as Parsedown;

class Parsedowner
{
    /**
     * Transform raw text to markdown.
     *
     * @return $html
     */
    public function toHTML($text)
    {
        $html = Parsedown::instance()->text($text);
        return $html;
    }
}
