<?php
echo "<h1>PostgreSQL接続テスト</h1>";

try {
    // PostgreSQLに接続
    $dsn = "pgsql:host=db;port=5432;dbname=form_app;user=postgres;password=password";
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "<p style='color: green; font-weight: bold;'>データベースに接続しました！</p>";
    
    // テーブルが存在するか確認し、なければ作成
    $pdo->exec("CREATE TABLE IF NOT EXISTS test_messages (
        id SERIAL PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        message TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    
    echo "<p>テーブルを確認/作成しました。</p>";
    
    // フォームが送信された場合はデータを挿入
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['message'])) {
        $stmt = $pdo->prepare("INSERT INTO test_messages (name, message) VALUES (:name, :message)");
        $stmt->execute([
            'name' => $_POST['name'],
            'message' => $_POST['message']
        ]);
        
        echo "<p style='color: green;'>メッセージを保存しました！</p>";
    }
    
    // データの取得と表示
    $stmt = $pdo->query("SELECT * FROM test_messages ORDER BY created_at DESC");
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // フォームの表示
    echo "<h2>新しいメッセージを追加</h2>";
    echo "<form method='post' action=''>";
    echo "<div style='margin-bottom: 10px;'>";
    echo "<label for='name' style='display: block; margin-bottom: 5px;'>名前:</label>";
    echo "<input type='text' id='name' name='name' required style='width: 300px; padding: 5px;'>";
    echo "</div>";
    echo "<div style='margin-bottom: 10px;'>";
    echo "<label for='message' style='display: block; margin-bottom: 5px;'>メッセージ:</label>";
    echo "<textarea id='message' name='message' required style='width: 300px; height: 100px; padding: 5px;'></textarea>";
    echo "</div>";
    echo "<button type='submit' style='background-color: #4CAF50; color: white; padding: 8px 15px; border: none; cursor: pointer;'>保存</button>";
    echo "</form>";
    
    // 保存されているメッセージの表示
    echo "<h2>保存されているメッセージ:</h2>";
    
    if (count($messages) > 0) {
        echo "<table border='1' cellpadding='5' style='border-collapse: collapse; width: 100%;'>";
        echo "<tr style='background-color: #f2f2f2;'><th>ID</th><th>名前</th><th>メッセージ</th><th>作成日時</th></tr>";
        
        foreach ($messages as $message) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($message['id']) . "</td>";
            echo "<td>" . htmlspecialchars($message['name']) . "</td>";
            echo "<td>" . nl2br(htmlspecialchars($message['message'])) . "</td>";
            echo "<td>" . htmlspecialchars($message['created_at']) . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "<p>まだメッセージがありません。</p>";
    }
    
} catch (PDOException $e) {
    echo "<p style='color: red; font-weight: bold;'>エラー: " . $e->getMessage() . "</p>";
    echo "<p>データベース接続情報を確認してください：</p>";
    echo "<ul>";
    echo "<li>ホスト: db</li>";
    echo "<li>データベース名: form_app</li>";
    echo "<li>ユーザー名: postgres</li>";
    echo "<li>パスワード: password</li>";
    echo "</ul>";
}

echo "<p><a href='index.php' style='color: #4CAF50; text-decoration: none;'>トップに戻る</a></p>";