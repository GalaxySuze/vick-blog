<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/7/11
 * Time: 16:28
 */

namespace App\Support;


class SolarTermSupport
{
    private $coefficient = [
        [5.4055, 2019, -1],//小寒
        [20.12, 2082, 1],//大寒
        [3.87],//立春
        [18.74, 2026, -1],//雨水
        [5.63],//惊蛰
        [20.646, 2084, 1],//春分
        [4.81],//清明
        [20.1],//谷雨
        [5.52, 1911, 1],//立夏
        [21.04, 2008, 1],//小满
        [5.678, 1902, 1],//芒种
        [21.37, 1928, 1],//夏至
        [7.108, 2016, 1],//小暑
        [22.83, 1922, 1],//大暑
        [7.5, 2002, 1],//立秋
        [23.13],//处暑
        [7.646, 1927, 1],//白露
        [23.042, 1942, 1],//秋分
        [8.318],//寒露
        [23.438, 2089, 1],//霜降
        [7.438, 2089, 1],//立冬
        [22.36, 1978, 1],//小雪
        [7.18, 1954, 1],//大雪
        [21.94, 2021, -1]//冬至
    ];

    private $termName = [
        "小寒",
        "大寒",
        "立春",
        "雨水",
        "惊蛰",
        "春分",
        "清明",
        "谷雨",
        "立夏",
        "小满",
        "芒种",
        "夏至",
        "小暑",
        "大暑",
        "立秋",
        "处暑",
        "白露",
        "秋分",
        "寒露",
        "霜降",
        "立冬",
        "小雪",
        "大雪",
        "冬至"
    ];

    private $months = [
        '01' => '一月',
        '02' => '二月',
        '03' => '三月',
        '04' => '四月',
        '05' => '五月',
        '06' => '六月',
        '07' => '七月',
        '08' => '八月',
        '09' => '九月',
        '10' => '十月',
        '11' => '十一月',
        '12' => '十二月',
    ];

    public function __construct()
    {
    }

    public function getSolarTerm($date)
    {
        list($year, $month, $day) = explode('-', $date);
        return $this->solarTermCalculation($year, $month, $day);
    }

    private function solarTermCalculation($_year, $month, $day)
    {
        $coefficient = $this->coefficient;
        $termName = $this->termName;
        $year = substr($_year, -2) + 0;
        $idx1 = ($month - 1) * 2;
        $_leap_value = floor(($year - 1) / 4);

        $dayOne = floor($year * 0.2422 + $coefficient[$idx1][0]) - $_leap_value;
        if (isset($coefficient[$idx1][1]) && $coefficient[$idx1][1] == $_year) {
            $dayOne += $coefficient[$idx1][2];
        }
        $dayTwo = floor($year * 0.2422 + $coefficient[$idx1 + 1][0]) - $_leap_value;
        if (isset($coefficient[$idx1 + 1][1]) && $coefficient[$idx1 + 1][1] == $_year) {
            $dayTwo += $coefficient[$idx1 + 1][2];
        }
        if ($day == $dayOne) {
            return $termName[$idx1];
        }
        if ($day == $dayTwo) {
            return $termName[$idx1 + 1];
        }
        return $this->months[$month];
    }
}