<?php
session_start();

// 1. フリー登録の判断
// クエリパラメータ "free=1" があればログインチェックをスキップ
if (!isset($_GET['free']) || $_GET['free'] != '1') {
    include("funcs.php");
    sschk(); // ログイン必須
} else {
    include("funcs.php"); // DB接続やエラー処理関数を使うために読み込み
}

// 2. POSTデータ取得
$username = $_POST["username"];
$bookname = $_POST["bookname"];
$bookurl = $_POST["bookurl"];
$comment = $_POST["comment"];

// 入力チェック
if (empty($username) || empty($bookname) || empty($bookurl) || empty($comment)) {
    exit("入力が不足しています。");
}

// 3. DB接続
$pdo = db_conn();

// 4. データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_kadai_an_table(id, username, bookname, bookurl, comment, indate) VALUES (NULL, :username, :bookname, :bookurl, :comment, sysdate())");
$stmt->bindValue(':username', $username, PDO::PARAM_STR);  
$stmt->bindValue(':bookname', $bookname, PDO::PARAM_STR);  
$stmt->bindValue(':bookurl', $bookurl, PDO::PARAM_STR);  
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);

$status = $stmt->execute(); // SQL実行

// 5. データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect("index.php");
}
?>
