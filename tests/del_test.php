<?php
    include "../mysql/mysql.php";
    include "../javascript/upload.php";

    $result = $conn->query("SELECT * from tests WHERE id='{$_GET['id']}'");
    $test = $result->fetch_assoc();
    $test['title'] = translitFile($test['title']);
    $dirname = '../../resources/images/tests/'.$_GET['id'].'-'.$test['title'];

    if(file_exists($dirname)){
        array_map('unlink', glob("$dirname/*.*"));
        rmdir($dirname);
    }

    if($conn->query("DELETE from questions WHERE id_test='{$_GET['id']}'") and $conn->query("DELETE from tests WHERE id='{$_GET['id']}'")) {
        header('Location: table_tests.php');
//                echo "Тест удален";
    } else {
        echo errorBlockHtml();
    }

