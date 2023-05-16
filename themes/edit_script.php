<?php
    include "../mysql/mysql.php";
    include "../javascript/upload.php";

    $result = $conn->query("SELECT * from themes  WHERE id='{$_GET['id']}' ");

    $theme = $result->fetch_assoc();
    if(isset($_POST["delete_image"]) && $_POST["delete_image"] == "true"){
        unlink($theme['image']);
        $save_old_image =  "";
    }
    else{
        $save_old_image = $theme['image'];
    }

    $image_path = saveThemesImage("image",  $_GET['id']);
    $image_path = "http://vkrmorozirina.troitsa-ivashevo.ru/mobile".substr($image_path, 5);

    if($image_path == "" && $save_old_image !="")
        $image_path = $save_old_image;

    $text = rtrim($_POST["text"], ",");

    if($conn->query("UPDATE themes SET title='{$_POST['title']}', image='{$image_path}', text='{$text}' WHERE id='{$_GET['id']}' ")) {
        header('Location: more.php?id='.$_GET['id']);
    } else {
        echo errorBlockHtml();
    }

