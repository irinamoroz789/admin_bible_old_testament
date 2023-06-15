<?php
include "../mysql/mysql.php";
include "../mysql/menu.php";
include "../check_auth.php";
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style/table_style.php" media="screen">
    <link rel="stylesheet" href="../style/style.php" media="screen">
    <title>Таблица версий приложения</title>
</head>
<body>

<div>
    <br>
    <div class="header">Таблица версий приложения</div>

    <table class="table">
        <tr>
            <th></th>
            <th>Версия</th>
            <th>Дата создания</th>
        </tr>
        <?php
        $res = $conn->query("SELECT * FROM app_version");

        //foreach($themes as $theme)
        while ($version = $res->fetch_assoc()) {

            ?>
            <tr>
                <td><?= $version['id'] ?></td>
                <td><?= $version['version'] ?></td>
                <td><?= $version['created_at'] ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <div class="bottom_block" id="addQuestion" onclick="location.href='../versions/form.php';"><span class="noselect">Добавить версию</span>
        <div id="circle"></div>
    </div>
    <br>
</body>
</html>
