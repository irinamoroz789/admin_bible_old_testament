<?php
include "../mysql/menu.php";
include "../check_auth.php";
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style/style.php" media="screen">
    <title>Добавить статью</title>
</head>
<script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>
<body class="body-form">
<div>
    <form class="decor" action="add_version.php" method="post" enctype="multipart/form-data">
        <div class="form-inner">
            <h4>Добавить новую версию приложения</h4>
            <input type="text" name="version" placeholder="Версия"><br>
            <input type="submit" value="Отправить">
        </div>
    </form>
</div>
</body>
</html>
