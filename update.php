<?php
session_start();
//1. POSTデータ取得
$username = $_POST["username"];
$bookname = $_POST["bookname"];
$bookurl = $_POST["bookurl"];
$comment = $_POST["comment"];
$id = $_POST["id"];

//2. DB接続します
include("funcs.php");
sschk();
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE gs_kadai_an_table SET username=:username, bookname=:bookname, bookurl=:bookurl, comment=:comment, indate=sysdate() WHERE id=:id");
$stmt->bindValue(':username', $username, PDO::PARAM_STR);  
$stmt->bindValue(':bookname', $bookname, PDO::PARAM_STR);  
$stmt->bindValue(':bookurl', $bookurl, PDO::PARAM_STR);  
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  
$stmt->bindValue(':id',$id,PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行 true or false

//４．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  redirect("select.php");
}
?>
