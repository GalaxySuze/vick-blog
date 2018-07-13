<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/6/23
 * Time: 18:19
 */

namespace App\Support;


use Parsedown;

class MarkdownSupport
{
    public $md;

    public function __construct(Parsedown $parseDown)
    {
        $this->md = $parseDown;
    }

    public function parse($content)
    {
        return $this->md->text($content);
    }
}