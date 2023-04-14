<?php
    include "mysql.php";
    if($conn->query("DELETE from themes WHERE id='".$_GET['id']."'")) {
        header('Location: table.php');
//        echo "Статья удалена";
    } else {
        echo "Ошибка";
    }

