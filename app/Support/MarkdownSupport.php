<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/6/23
 * Time: 18:19
 */

namespace App\Support;


use App\Traits\Toolkit;
use Parsedown;

class MarkdownSupport
{
    use Toolkit;

    /**
     * @var Parsedown
     */
    public $md;

    /**
     * MarkdownSupport constructor.
     */
    public function __construct()
    {
        $this->md = $this->setSupport(Parsedown::class);
    }

    /**
     * @param $content
     * @return string
     */
    public function parse($content)
    {
        return $this->md->text($content);
    }
}