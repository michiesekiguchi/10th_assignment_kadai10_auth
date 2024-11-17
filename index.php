<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>Book登録</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <style>div{padding: 10px;font-size:16px;}</style>
    </head>
    <body>

        <!-- Head[Start] -->
        <header>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                <?php if($_SESSION["kanri_flg"]=="1"){ ?>
                    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
                    <?php } ?>
                    <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
                </div>
            </nav>
        </header>
        <!-- Head[End] -->

        <!-- Main[Start] -->
        <?php if( !empty($success_message) ): ?>
            <!-- <p class="success_message">--<?php /*echo $success_message; */?> </p> -->
            <p class="success_message" style="color:green; font-weight: bold;"><?php echo htmlspecialchars($success_message, ENT_QUOTES, 'UTF-8'); ?></p>
        <?php endif; ?>

        <form method="post" action="insert.php?free=1">
            <div class="jumbotron">
                <fieldset>
                    <legend>📗Book登録📕</legend>
                    <td>ユーザー名：<input type="text" name="username"></td><br>
                    <td>本のタイトル：<input type="text" name="bookname"></td><br>
                    <td>本のURL：<input type="text" name="bookurl"></td><br>
                    <td>コメント：<textArea name="comment" rows="5" cols="50"></textArea></td><br>
                    <input type="submit" value="送信" class="form">
                </fieldset>
            </div>
        </form>
        <!-- Main[End] --> 


    </body>
</html>
