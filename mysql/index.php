<?php

    include "mysql.php";
    include "menu.php";
    //phpinfo();

    //$themes = $conn->query("SELECT * FROM themes")->fetch_all(MYSQLI_ASSOC);

    // вывод главной страницы
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Главная</title>
        <link rel="stylesheet" href="../style/style.php" media="screen">
    </head>
    <body>
    <div class="heading">Админка для приложения по Ветхому Завету</div>
    <div class="div_block">
        <div class="item_block">
            <h2>Статьи по Ветхому Завету</h2>
            <a href = "../themes/table.php">Таблица</a>
            <div class="bottom_block" id="addQuestion" onclick="location.href='../themes/form.php';"><span class="noselect">Добавить статью</span><div id="circle"></div></div><br>
        </div>
        <div class="item_block">
            <h2>Тесты по Ветхому Завету</h2>
            <a href = "../tests/table_tests.php">Таблица</a>
            <div class="bottom_block" id="addQuestion" onclick="location.href='../tests/test_form.php';"><span class="noselect">Добавить тест</span><div id="circle"></div></div><br>
        </div>
    </div>
    </body>
    </html>