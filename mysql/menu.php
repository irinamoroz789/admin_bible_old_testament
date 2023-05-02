<?php

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style/style.php" media="screen">
</head>
<body>
<div class="hamburger-menu">
    <input id="menu__toggle" type="checkbox" />
    <label class="menu__btn" for="menu__toggle">
        <span></span>
    </label>

    <ul class="menu__box">
        <li><a class="menu__item" href="index.php">Главная</a></li>
        <li><a class="menu__item" href="../themes/table.php">Статьи</a></li>
        <ul class="submenu"><li><a class="menu__item" href="../themes/form.php">Добавить статью</a></li></ul>
        <li><a class="menu__item" href="../tests/table_tests.php">Тесты</a></li>
        <ul class="submenu"><li><a class="menu__item" href="../tests/test_form.php">Добавить тест</a></li></ul>
    </ul>
</div>
</body>
</html>
