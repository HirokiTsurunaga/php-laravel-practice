<?php
echo "<h1>PHP制御構造</h1>";

// if文
$temperature = 28;

echo "<h2>条件分岐（if文）</h2>";
if ($temperature > 30) {
    echo "<p>暑いです！</p>";
} elseif ($temperature > 25) {
    echo "<p>少し暑いです</p>";
} else {
    echo "<p>快適な気温です</p>";
}

// 三項演算子
$result = ($temperature > 25) ? "暑い" : "涼しい";
echo "<p>三項演算子の結果: " . $result . "</p>";

// switch文
$day = "月曜日";
echo "<h2>条件分岐（switch文）</h2>";
echo "<p>今日は{$day}です:</p>";

switch ($day) {
    case "月曜日":
        echo "<p>週のはじまりです</p>";
        break;
    case "金曜日":
        echo "<p>週末が近いです</p>";
        break;
    case "土曜日":
    case "日曜日":
        echo "<p>週末です</p>";
        break;
    default:
        echo "<p>平日です</p>";
}

// for ループ
echo "<h2>ループ構造（for）</h2>";
echo "<p>カウントアップ: ";
for ($i = 1; $i <= 5; $i++) {
    echo $i . " ";
}
echo "</p>";

// while ループ
echo "<h2>ループ構造（while）</h2>";
$count = 5;
echo "<p>カウントダウン: ";
while ($count > 0) {
    echo $count . " ";
    $count--;
}
echo "</p>";

// do-while ループ
echo "<h2>ループ構造（do-while）</h2>";
$num = 1;
echo "<p>数値: ";
do {
    echo $num . " ";
    $num++;
} while ($num <= 5);
echo "</p>";

// foreach ループ
$colors = ["赤", "青", "緑", "黄色"];
echo "<h2>ループ構造（foreach）</h2>";
echo "<p>色のリスト: ";
foreach ($colors as $color) {
    echo $color . " ";
}
echo "</p>";

// 連想配列のforeach
$scores = [
    "国語" => 85,
    "数学" => 92,
    "英語" => 78
];

echo "<h3>テスト結果:</h3>";
echo "<ul>";
foreach ($scores as $subject => $score) {
    echo "<li>" . $subject . ": " . $score . "点</li>";
}
echo "</ul>";

// ループ制御
echo "<h2>ループ制御（break, continue）</h2>";
echo "<p>breakの例（5までのうち、3で中断）: ";
for ($i = 1; $i <= 10; $i++) {
    if ($i > 5) {
        break;
    }
    if ($i == 3) {
        echo "<strong>" . $i . "</strong> ";
    } else {
        echo $i . " ";
    }
}
echo "</p>";

echo "<p>continueの例（1〜10のうち、偶数のみ表示）: ";
for ($i = 1; $i <= 10; $i++) {
    if ($i % 2 != 0) {
        continue;
    }
    echo $i . " ";
}
echo "</p>";