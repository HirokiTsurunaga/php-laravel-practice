<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>PHP + PostgreSQL学習</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f7f9;
        }
        .container {
            background-color: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
        }
        .menu {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        .menu-item {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 20px 10px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .menu-item:hover {
            background-color: #45a049;
        }
        .description {
            margin-top: 30px;
            line-height: 1.6;
        }
        .note {
            background-color: #fff3e0;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
            border-left: 4px solid #ff9800;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>PHP + PostgreSQL 学習メニュー</h1>
        <p>Docker環境での学習用サンプルページです。以下のリンクから各サンプルにアクセスできます。</p>
        
        <div class="menu">
            <a href="hello.php" class="menu-item">PHPの基本</a>
            <a href="control.php" class="menu-item">制御構造</a>
            <a href="functions.php" class="menu-item">関数</a>
            <a href="form.html" class="menu-item">フォーム処理</a>
            <a href="db_test.php" class="menu-item">DB接続テスト</a>
            <a href="laravel_index.php" class="menu-item">Laravel Welcome</a>
        </div>
        
        <div class="description">
            <h2>学習内容</h2>
            <ul>
                <li><strong>PHPの基本</strong> - 変数、配列、連想配列など基本的な構文</li>
                <li><strong>制御構造</strong> - 条件分岐（if, switch）、ループ（for, while, foreach）</li>
                <li><strong>関数</strong> - 関数の定義、引数、戻り値、スコープ</li>
                <li><strong>フォーム処理</strong> - HTMLフォームとPHPでのデータ処理</li>
                <li><strong>DB接続</strong> - PostgreS