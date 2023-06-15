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
    <title>Таблица статей</title>
</head>
<body>

<div>
    <br>
    <div class="header">Таблица статей по Ветхому Завету</div>

    <table class="table">
        <tr>
            <th></th>
            <th>Заголовок</th>
            <th>URL-картинки</th>
            <th>Текст</th>
            <th>Подробнее</th>
            <th>Редактировать</th>
            <th>Удалить</th>
        </tr>
        <?php
        $res = $conn->query("SELECT * FROM themes");

        //foreach($themes as $theme)
        while ($theme = $res->fetch_assoc()) {

            ?>
            <tr>
                <td><?= $theme['id'] ?></td>
                <td><?= $theme['title'] ?></td>
                <td><span class="image" class="text"><?= $theme['image'] ?></span></td>
                <td><span class="text"><?= $theme['text'] ?></span></td>
                <td><a href="more.php?id=<?= $theme['id'] ?>">more</a></td>
                <td><a href="edit.php?id=<?= $theme['id'] ?>">edit</a></td>
                <td><a href="del.php?id=<?= $theme['id'] ?>"
                       onclick="return confirm('Вы действительно хотите удалить статью?');">del</a></td>
            </tr>
            <?php
        }
        ?>

    </table>

</body>
</html>
