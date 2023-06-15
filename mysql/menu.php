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
    <input id="menu__toggle" type="checkbox"/>
    <label class="menu__btn" for="menu__toggle">
        <span></span>
    </label>

    <ul class="menu__box">
        <li><a class="menu__item" href="../mysql/home.php">Главная</a></li>
        <li><a class="menu__item" href="../themes/table.php">Статьи</a></li>
        <ul class="submenu">
            <li><a class="menu__item" href="../themes/form.php">Добавить статью</a></li>
        </ul>
        <li><a class="menu__item" href="../tests/table_tests.php">Тесты</a></li>
        <ul class="submenu">
            <li><a class="menu__item" href="../tests/test_form.php">Добавить тест</a></li>
        </ul>
        <li><a class="menu__item" href="../versions/table_versions.php">Версии приложения</a></li>
        <br><br>
        <form method="post" action="../do_logout.php">
            <button type="submit" class="btn-primary">Выход</button>
        </form>
    </ul>
</div>
</body>
</html>
