<?php
    include "../mysql/mysql.php";

    $result = $conn->query("SELECT * from themes WHERE id='{$_GET['id']}'");
    $theme = $result->fetch_assoc();
    unlink($theme['image']);

    if($conn->query("DELETE from themes WHERE id='{$_GET['id']}'")) {
       header('Location: table.php');
//        echo "Статья удалена";
//        echo '<script type="text/javascript">
//
//          window.onload = function () { alert("Статья удалена");  }
//
//</script>';
    } else {
        echo errorBlockHtml();
    }

