<?php

$year = $argv[1];
$month = $argv[2];

function show_calender(int $year, int $month)
{

  // 初日の曜日を取得
  $date = date('w', strtotime("{$year}-{$month}"));
  // 該当年月の日数を取得
  $amount = date('t', strtotime("{$year}-{$month}"));

  // 一週間の曜日
  $week = [
    'Sun',
    'Mon',
    'Tue',
    'Wed',
    'Thu',
    'Fri',
    'Sat',
  ];

  // 日付を格納する配列
  $days = [];

  // 日付の配列を生成
  for ($i = 1; $i <= $amount; $i++) {
    array_push($days, $i);
  }

  // 初日の曜日までの空白を生成
  for ($i = 0; $i < $date; $i++) {
    array_unshift($days, ' ');
  }

  // 曜日の出力
  foreach ($week as $weekOfDay) {
    echo $weekOfDay;
    if (next($week)) {
      echo '|';
    } else {
      echo "\n";
    }
  }

  // 日付の出力
  foreach ($days as $i => $day) {
    // 7日ごとに改行
    if ($i % 7 === 0 && $i !== 0) {
      echo "\n";
    }
    echo $day;

    if (next($days)) {
      echo '|';
    }
  }
}

show_calender($year, $month);
