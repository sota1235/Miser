<?php

/**
 * @copyright (c) sota1235
 */

/**
 * 指定された年月日のカレンダーを表示するページへリダイレクト
 *
 * @param int  $year
 * @param int  $month
 */
function redirectToCalendar($year, $month)
{
    return "/?year=${year}&month=${month}";
}
