<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\Label;
use App\Support\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LabelController extends Controller
{
    public function __construct()
    {

    }

    public function labelPage()
    {
//        dd($this->handleDisplay(
//            Helper::modelAll(Label::class)
//        ));
        return view('home.label', [
            'labelList' => $this->handleDisplay(
                Helper::modelAll(Label::class)
            )
        ]);
    }

    public function handleDisplay($list)
    {
        $articlesCount = [];
        foreach (Article::all(['label'])->toArray() as $item) {
            foreach (array_get($item, 'label') as $labelTime) {
                if (array_key_exists($labelTime, $articlesCount)) {
                    $articlesCount[$labelTime]['count'] ++;
                } else {
                    $articlesCount[$labelTime]['count'] = 1;
                }
            }
        }
        foreach ($list as $labelId => &$labelItem) {
            $labelItem['articleTotal'] = $articlesCount[$labelId]['count'] ?? 0;
        }
        return $list;
    }
}
