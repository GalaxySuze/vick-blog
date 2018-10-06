<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/7/11
 * Time: 16:28
 */

namespace App\Support;


use Carbon\Carbon;

class SolarTermSupport
{
    /**
     * @var array
     */
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

    /**
     * @var array
     */
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

    /**
     * @var array
     */
    public $months = [
        '01' => ['zh' => '一月', 'en' => 'January'],
        '02' => ['zh' => '二月', 'en' => 'February'],
        '03' => ['zh' => '三月', 'en' => 'March'],
        '04' => ['zh' => '四月', 'en' => 'April'],
        '05' => ['zh' => '五月', 'en' => 'May'],
        '06' => ['zh' => '六月', 'en' => 'June'],
        '07' => ['zh' => '七月', 'en' => 'July'],
        '08' => ['zh' => '八月', 'en' => 'August'],
        '09' => ['zh' => '九月', 'en' => 'September'],
        '10' => ['zh' => '十月', 'en' => 'October'],
        '11' => ['zh' => '十一月', 'en' => 'November'],
        '12' => ['zh' => '十二月', 'en' => 'December'],
    ];

    /**
     * @param $date
     * @return string
     */
    public function getSolarTerm($date)
    {
        list($year, $month, $day) = explode('-', $date);
        return $this->solarTermCalculation($year, $month, $day);
    }

    /**
     * @param $_year
     * @param $month
     * @param $day
     * @return string
     */
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
        $yearPrefix = $this->setYearPrefix($_year);
        if ($day == $dayOne) {
            return $yearPrefix . $termName[$idx1];
        }
        if ($day == $dayTwo) {
            return $yearPrefix . $termName[$idx1 + 1];
        }
        return $yearPrefix . $this->months[$month]['zh'];
    }

    /**
     * @param $year
     * @return string
     */
    public function setYearPrefix($year)
    {
        switch ($year) {
            case $year == date('Y', time()):
                return '今年';
                break;
            case $year == date('Y', strtotime('-1 year')):
                return '去年';
                break;
            default:
                return '那年';
        }
    }
}