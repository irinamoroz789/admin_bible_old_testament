<?php
    include "../mysql/mysql.php";

    $result = $conn->query("SELECT * from themes WHERE id='{$_GET['id']}'");
    $theme = $result->fetch_assoc();
    unlink(str_replace("http://vkrmorozirina.troitsa-ivashevo.ru/mobile", "../..", $theme['image']));

    if($conn->query("DELETE from themes WHERE id='{$_GET['id']}'")) {
       header('Location: table.php');
    } else {
        echo errorBlockHtml();
    }

