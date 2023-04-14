<?php
include "mysql.php";
include "menu.php";
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
    <div class="header">Тесты по Ветхому Завету</div>

    <table class="table">
        <tr>
            <th></th>
            <th>Название теста</th>
            <th>Вопросы</th>
<!--            <th>Подробнее</th>-->
            <th>Редактировать</th>
            <th>Удалить</th>
        </tr>


        <?php
        $res = $conn->query("SELECT * FROM tests");

        //foreach($themes as $theme)
        while($test = $res->fetch_assoc())
        {
            $id_test = $test['id'];
            $result = $conn->query("SELECT * from questions WHERE id_test= $id_test ");

            ?>
            <tr>
                <td><?=$test['id']?></td>
                <td><?=$test['title']?></td>
                <td><span class="text_question">
                <?php
                while($question = $result->fetch_assoc())
                {
                ?>
                    <?=$question['question']?><br>
                <?php
                }
                ?>
                </span></td>
<!--                <td><a href="more_test.php?id=--><?//=$test['id']?><!--">more</a></td>-->
                <td><a href="edit_test.php?id=<?=$test['id']?>">edit</a></td>
                <td><a href="del_test.php?id=<?=$test['id']?>">del</a></td>
            </tr>
            <?php
        }
        ?>

    </table>

</body>
</html>

