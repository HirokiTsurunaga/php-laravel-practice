<?php
echo "<h1>PHP関数</h1>";

// 基本的な関数
function sayHello($name) {
    return "こんにちは、" . $name . "さん！";
}

echo "<p>" . sayHello("田中") . "</p>";

// デフォルト引数を持つ関数
function calculateTotal($price, $taxRate = 0.10) {
    return $price + ($price * $taxRate);
}

$price = 1000;
echo "<p>" . $price . "円の商品の税込価格: " . calculateTotal($price) . "円</p>";
echo "<p>" . $price . "円の商品の税込価格（税率8%）: " . calculateTotal($price, 0.08) . "円</p>";

// 可変長引数
function sumAll(...$numbers) {
    return array_sum($numbers);
}

echo "<p>1+2+3+4+5 = " . sumAll(1, 2, 3, 4, 5) . "</p>";
echo "<p>10+20+30 = " . sumAll(10, 20, 30) . "</p>";

// 無名関数（クロージャ）
$greet = function($name) {
    return "やあ、" . $name . "！";
};

echo "<p>" . $greet("佐藤") . "</p>";

// 引数の型宣言とリターン型宣言
function multiply(int $a, int $b): int {
    return $a * $b;
}

echo "<p>5 × 7 = " . multiply(5, 7) . "</p>";

// 値渡しと参照渡し
function incrementByValue($number) {
    $number++;
    return $number;
}

function incrementByReference(&$number) {
    $number++;
    return $number;
}

$a = 10;
$resultA = incrementByValue($a);
echo "<p>値渡し: 元の値 = " . $a . ", 関数の結果 = " . $resultA . "</p>";

$b = 10;
$resultB = incrementByReference($b);
echo "<p>参照渡し: 元の値 = " . $b . ", 関数の結果 = " . $resultB . "</p>";

// コールバック関数
$numbers = [1, 2, 3, 4, 5];
$doubled = array_map(function($number) {
    return $number * 2;
}, $numbers);

echo "<p>元の配列: " . implode(", ", $numbers) . "</p>";
echo "<p>2倍した配列: " . implode(", ", $doubled) . "</p>";

// 再帰関数
function factorial($n) {
    if ($n <= 1) {
        return 1;
    } else {
        return $n * factorial($n - 1);
    }
}

echo "<p>5の階乗: " . factorial(5) . "</p>";

// スコープ
$globalVar = "グローバル変数";

function testScope() {
    $localVar = "ローカル変数";
    global $globalVar;
    
    echo "<p>関数内からのアクセス: " . $globalVar . "</p>";
    echo "<p>関数内のローカル変数: " . $localVar . "</p>";
}

testScope();
echo "<p>関数外からのアクセス: " . $globalVar . "</p>";
// echo "<p>ローカル変数へのアクセス（エラーになる）: " . $localVar . "</p>";

// 組み込み関数の例
echo "<h2>PHP組み込み関数の例</h2>";
echo "<p>文字列の長さ: " . strlen("こんにちは") . "</p>";
echo "<p>配列の要素数: " . count($numbers) . "</p>";
echo "<p>現在の日時: " . date('Y-m-d H:i:s') . "</p>";
echo "<p>乱数（1〜100）: " . rand(1, 100) . "</p>";