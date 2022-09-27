<?php

// PHPカレンダー課題
// 作業時間 1時間半程
// 参考にした情報
// https://roomx.jp/rooma/web/php/php_calendar1.php (カレンダー生成ロジック)

// 引数を取得
$year = $argv[1];
$month = $argv[2];

// カレンダーの表示関数
// TODO: 引数にタイプヒントを付けてください
function show_calender($year, $month)
{

  //各週の配列
  // TODO: 配列を定義する場合に array() はもう使わないので [] を使って下さい
  $week1 = array();
  $week2 = array();
  $week3 = array();
  $week4 = array();
  $week5 = array();
  $week6 = array();

  // 指定月の開始日を取得
  // TODO: 変数名は略さずできるだけ意味の分かる単語にして欲しいです
  // TODO: クオーテーションマークは必要がない限りシングルを使うようにしています
  // NOTE: mktime 以外にも strtotime でもできますよ
  $mi = date("w", mktime(0, 0, 0, $month, 1, $year));

  // 日数を格納
  $dx = 0;

  // 各週のデータ作成
  // TODO: week1 ~ 6 に対対するなら $count = 1: $count <= 6 の方が分かりやすいですね
  // TODO: for と if と for で少しネストが激しいので結構ややこしいですね💦
  for ($count = 0; $count <= 5; $count++) {
    if ($count === 0) {
      // 第1週の値を格納
      for ($i = $mi; $i <= 6; $i++) {
        $dx++;
        ${"week" . $count + 1}[$i] = $dx;
      }
    } elseif ($count === 5 && $dx < 31) {
      // 第6週の値を格納
        for ($i = 0; $i <= 6; $i++) {
          $dx++;
          ${"week" . $count + 1}[$i] = $dx;
        }
    } else {
      // 上記以外の週の値を格納
      $dx = ${"week" . $count}[6];
      for ($i = 0; $i <= 6; $i++) {
        $dx++;
        ${"week" . $count + 1}[$i] = $dx;
      }
    }
    var_export($week2);
  }

  // 存在しない日付を確認
  for ($i = 0; $i <= 6; $i++) {
    if (!array_key_exists($i, $week1)) {
      $week1[$i] = '';
    }

    if (!checkdate($month, $week5[$i], $year)) {
      $week5[$i] = '';
    }

    if (!empty($week6)) {
      if (!checkdate($month, $week6[$i], $year)) {
        $week6[$i] = '';
      }
    }
  }

  // 曜日を出力
  $arr = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
  foreach ($arr as $key) {
    echo $key;
    if (next($arr)) {
      echo "|";
    } else {
      echo "\n";
    }
  }

  // 日付を出力
  for ($i = 1; $i <= 6; $i++) {
    foreach (${"week" . $i} as $day) {
      echo $day;
      if (next(${"week" . $i})) {
        echo "|";
      }
    }
    echo "\n";
  }
}

// カレンダー表示関数を実行
echo show_calender($year, $month);
