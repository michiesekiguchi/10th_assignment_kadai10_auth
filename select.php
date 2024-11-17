<?php
//0. SESSION開始！！
session_start();

//１．関数群の読み込み
include("funcs.php");

//LOGINチェック → funcs.phpへ関数化しましょう！
sschk();


//２．データ登録SQL作成
$pdo = db_conn();
$sql = "SELECT * FROM gs_kadai_an_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
$json = json_encode($values,JSON_UNESCAPED_UNICODE);

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>一覧表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <?=$_SESSION["name"]?>さん、こんにちは！
      <a class="navbar-brand" href="index.php">Bookデータ登録</a></var>
      <?php if($_SESSION["kanri_flg"]=="1"){ ?>
      <a class="navbar-brand" href="user.php">ユーザー登録</a></var>
      <?php } ?>
      <a class="navbar-brand" href="logout.php">ログアウト</a></var>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->


<!-- Main[Start] -->
<div>
    <div class="container jumbotron">
      <table>
      <?php foreach($values as $v){ ?>
        <!-- ！！下記、変更を加える！！更新＆削除リンクをつける -->
        <tr>
          <td><?=h($v["id"])?></td>
          <td><?=h($v["username"])?></td>
          <td><?=h($v["bookname"])?></td>
          <td><a href="<?=h($v["bookurl"])?>" target="_blank"><?=h($v["bookurl"])?></a></td>
          <td><?=h($v["comment"])?></td>
          <td><?=h($v["indate"])?></td>
          <?php if($_SESSION["kanri_flg"]=="1"){ ?>
          <td><a href="detail.php?id=<?=h($v["id"])?>">[更新]</a></td>
          <?php } ?>
          <?php if($_SESSION["kanri_flg"]=="1"){ ?>
          <td><a href="delete.php?id=<?=h($v["id"])?>">[削除]</a></td>
          <?php } ?>

        </tr>
      <?php } ?>
      </table>

  </div>
</div>
<!-- Main[End] -->


<script>
  const a = '<?php echo $json; ?>';
  console.log(JSON.parse(a));
</script>
</body>
</html>
