<?php
// これはコメントです
echo "<h1>Hello, PHP World!</h1>"; 

// 変数
$name = "山田太郎";
$age = 25;
echo "<p>私の名前は" . $name . "、" . $age . "歳です。</p>";

// 変数の型を確認
echo "<p>変数nameの型: " . gettype($name) . "</p>";
echo "<p>変数ageの型: " . gettype($age) . "</p>";

// 配列
$fruits = ["りんご", "バナナ", "オレンジ"];
echo "<p>好きな果物は" . $fruits[0] . "です。</p>";
echo "<p>フルーツの数: " . count($fruits) . "個</p>";

// 配列の内容を表示
echo "<p>フルーツリスト:</p>";
echo "<ul>";
foreach($fruits as $fruit) {
    echo "<li>" . $fruit . "</li>";
}
echo "</ul>";

// 連想配列
$person = [
    "name" => "鈴木一郎",
    "age" => 30,
    "job" => "エンジニア"
];
echo "<p>" . $person["name"] . "さんは" . $person["job"] . "です。</p>";

// 連想配列の内容を表示
echo "<p>人物情報:</p>";
echo "<ul>";
foreach($person as $key => $value) {
    echo "<li>" . $key . ": " . $value . "</li>";
}
echo "</ul>";

// PHP環境情報
echo "<h2>PHP環境情報</h2>";
echo "<p>PHP Version: " . phpversion() . "</p>";
echo "<p>実行環境: " . php_uname() . "</p>";