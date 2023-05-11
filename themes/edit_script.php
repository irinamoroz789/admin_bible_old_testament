<?php
    include "../mysql/mysql.php";
    include "../javascript/upload.php";

    $result = $conn->query("SELECT * from themes  WHERE id='{$_GET['id']}' ");
//    $old_title = translitFile($_POST["old_title"]);
//    $new_title = translitFile($_POST["title"]);
//    $dirname = '../../resources/images/themes/';

    $theme = $result->fetch_assoc();
    if(isset($_POST["delete_image"]) && $_POST["delete_image"] == "true"){
        unlink($theme['image']);
        $save_old_image =  "";
    }
    else{
        $save_old_image = $theme['image'];
    }

//    if($_POST["title"] != $_POST["old_title"]){
//        $save_new_image = str_replace($old_title, $new_title, $save_old_image);
//        rename($save_old_image, $save_new_image);
//        $save_old_image = $save_new_image;
//
//    }
    $image_path = saveThemesImage("image",  $_GET['id']);
    // $image_pass = "http://pstgu.yss.su/1/MorozIrina/mobile". trim($image_pass, ".");

    if($image_path == "" && $save_old_image !="")
        $image_path = $save_old_image;

    $text = rtrim($_POST["text"], ",");

    if($conn->query("UPDATE themes SET title='{$_POST['title']}', image='{$image_path}', text='{$text}' WHERE id='{$_GET['id']}' ")) {
        header('Location: more.php?id='.$_GET['id']);
    } else {
        echo errorBlockHtml();
    }

