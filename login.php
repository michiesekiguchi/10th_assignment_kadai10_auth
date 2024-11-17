<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/main.css" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
<title>ログイン</title>
</head>
<body>


<header>
  <nav class="navbar navbar-default" style="background-color: #007bff; color: white;">
    <div class="container-fluid">
      <div class="navbar-header">
        <span class="navbar-text" style="color: white;">ログイン</span> <!-- ログイン文字を白に -->
        <a class="navbar-brand" href="index.php" style="color: white;">Bookデータ登録</a> <!-- 同じ行に配置 -->
      </div>
    </div>
  </nav>
</header>



<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
<form name="form1" action="login_act.php" method="post">
ID:<input type="text" name="lid">
PW:<input type="password" name="lpw">
<input type="submit" value="ログイン">
</form>


</body>
</html>