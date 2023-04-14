<?php
include "mysql.php";
include "menu.php";
//$themes = $conn->query("SELECT * FROM themes")->fetch_all(MYSQLI_ASSOC);
//echo "<table border='1'>";
//foreach($themes as $theme)
//{
//    echo "<tr>";
//    echo "<td>".$theme['id']."</td>";
//    echo "<td>".$theme['title']."</td>";
//    echo "<td>".$theme['image']."</td>";
//    echo "<td>".$theme['text']."</td>";
//    echo "<td><a href=\"more.php?id=".$theme['id']."\">Подробнее</a></td>";
//    echo "<td><a href=\"del.php?id=".$theme['id']."\">Удалить</a></td>";
//    echo "<td><a href=\"edit.php?id=".$theme['id']."\">Изменить</a></td>";
//    echo "</tr>";
//}
//echo "</table>";
//
//
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="table_style.php" media="screen">
</head>
<body>

<div>
    <br>
    <div class="header">Статьи по Ветхому Завету</div>

    <table class="table">
        <tr>
            <th></th>
            <th>Заголовок</th>
            <th>URL-картинки</th>
            <th>Текст</th>
            <th>Подробнее</th>
            <th>Удалить</th>
            <th>Редактировать</th>
        </tr>


            <?php
            $res = $conn->query("SELECT * FROM themes");

            //foreach($themes as $theme)
            while($theme = $res->fetch_assoc())
            {

            ?>
        <tr>
                <td><?=$theme['id']?></td>
                <td><?=$theme['title']?></td>
                <td><span class="image" class="text"><?=$theme['image']?></span></td>
                <td><span class="text"><?=$theme['text']?></span></td>
                <td><a href="more.php?id=<?=$theme['id']?>">more</a></td>
                <td><a href="del.php?id=<?=$theme['id']?>">del</a></td>
                <td><a href="edit.php?id=<?=$theme['id']?>">edit</a></td>
        </tr>
            <?php
            }
            ?>

    </table>

</body>
</html>
