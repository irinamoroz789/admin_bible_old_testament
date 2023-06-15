<?php

include "mysql.php";
include "menu.php";
include "../check_auth.php";

$days = 90;
$seconds = time() - $days * 24 * 60 * 60;
$date = date('Y-m-d H:i:s', $seconds);
$conn->query("DELETE FROM result_tests WHERE updated_at < '" . $date . " ' ");
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
<div class="div_block">
    <div class="item_block">
        <h2>Статьи по Ветхому Завету</h2>
        <div class="href_style"><a href="../themes/table.php">Таблица</a></div>
        <div class="bottom_block" id="addQuestion" onclick="location.href='../themes/form.php';">
            <span class="noselect">Добавить статью</span>
            <div id="circle"></div>
        </div>
        <br>
    </div>
    <div class="item_block">
        <h2>Тесты по Ветхому Завету</h2>
        <div class="href_style"><a href="../tests/table_tests.php">Таблица</a></div>
        <div class="bottom_block" id="addQuestion" onclick="location.href='../tests/test_form.php';">
            <span class="noselect">Добавить тест</span>
            <div id="circle"></div>
        </div>
        <br>
    </div>
</div>
</body>
</html>

