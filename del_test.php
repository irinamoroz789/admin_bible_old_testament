<?php
    include "mysql.php";
    if($conn->query("DELETE from questions WHERE id_test='".$_GET['id']."'") and $conn->query("DELETE from tests WHERE id='".$_GET['id']."'")) {
        header('Location: table_tests.php');
        //        echo "Тест удален";
    } else {
        echo "Ошибка";
    }

