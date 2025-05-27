<?php
// フォームが送信されたかチェック
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームデータの取得と検証
    $name = $_POST["name"] ?? "";
    $email = $_POST["email"] ?? "";
    $gender = $_POST["gender"] ?? "";
    $age = $_POST["age"] ?? "";
    $interests = $_POST["interests"] ?? [];
    $message = $_POST["message"] ?? "";
    
    // 簡単なバリデーション
    $errors = [];
    
    if (empty($name)) {
        $errors[] = "名前を入力してください";
    }
    
    if (empty($email)) {
        $errors[] = "メールアドレスを入力してください";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "有効なメールアドレスを入力してください";
    }
    
    if (empty($age)) {
        $errors[] = "年齢層を選択してください";
    }
    
    if (empty($message)) {
        $errors[] = "メッセージを入力してください";
    }
    
    // HTML出力の開始
    echo '<!DOCTYPE html>
    <html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>フォーム送信結果</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #f8f9fa;
            }
            .container {
                background-color: white;
                padding: 25px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
            }
            h1 {
                color: #333;
                margin-top: 0;
                padding-bottom: 10px;
                border-bottom: 1px solid #eee;
            }
            .alert {
                padding: 15px;
                border-radius: 4px;
                margin-bottom: 20px;
            }
            .alert-success {
                background-color: #d4edda;
                color: #155724;
                border: 1px solid #c3e6cb;
            }
            .alert-danger {
                background-color: #f8d7da;
                color: #721c24;
                border: 1px solid #f5c6cb;
            }
            .btn {
                display: inline-block;
                padding: 10px 15px;
                background-color: #4CAF50;
                color: white;
                text-decoration: none;
                border-radius: 4px;
                margin-top: 15px;
            }
            dl {
                display: grid;
                grid-template-columns: 1fr 2fr;
                gap: 10px;
            }
            dt {
                font-weight: bold;
                color: #555;
            }
            ul {
                padding-left: 20px;
                margin: 0;
            }
        </style>
    </head>
    <body>
        <div class="container">';
    
    // エラーがなければ処理を続行
    if (empty($errors)) {
        echo '<h1>送信完了</h1>';
        echo '<div class="alert alert-success">フォームが正常に送信されました。</div>';
        
        echo '<dl>';
        echo '<dt>名前</dt><dd>' . htmlspecialchars($name) . '</dd>';
        echo '<dt>メールアドレス</dt><dd>' . htmlspecialchars($email) . '</dd>';
        echo '<dt>性別</dt><dd>' . htmlspecialchars($gender) . '</dd>';
        echo '<dt>年齢層</dt><dd>' . htmlspecialchars($age) . '</dd>';
        
        echo '<dt>興味のある分野</dt><dd>';
        if (!empty($interests)) {
            echo '<ul>';
            foreach ($interests as $interest) {
                echo '<li>' . htmlspecialchars($interest) . '</li>';
            }
            echo '</ul>';
        } else {
            echo '選択なし';
        }
        echo '</dd>';
        
        echo '<dt>メッセージ</dt><dd>' . nl2br(htmlspecialchars($message)) . '</dd>';
        echo '</dl>';
        
        // ここでデータベースに保存したり、メール送信したりする処理を追加できます（Day 7で実装予定）
        
        echo '<a href="form.html" class="btn">フォームに戻る</a>';
    } else {
        // エラーがあれば表示
        echo '<h1>エラー</h1>';
        echo '<div class="alert alert-danger">フォームの送信中にエラーが発生しました。</div>';
        echo '<ul>';
        foreach ($errors as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '</ul>';
        echo '<a href="javascript:history.back()" class="btn">戻る</a>';
    }
    
    echo '</div></body></html>';
} else {
    // POSTリクエストでない場合はリダイレクト
    header("Location: form.html");
    exit;
}