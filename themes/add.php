<?php
    include "../mysql/mysql.php";
    include "../javascript/upload.php";
    include "../mysql/menu.php";
    header("Content-type: text/html; charset=utf-8");
	if(isset($_POST)){


        $text = rtrim($_POST["text"], ",");

        if($conn->query("INSERT INTO themes (title, text) VALUES ('{$_POST["title"]}', '{$text}')")){
            $result = $conn->query("SELECT * from themes WHERE title='{$_POST["title"]}' ");
            $theme = $result->fetch_assoc();

            $image_path = saveThemesImage("image",  $theme['id']);
                // $image_pass = "http://pstgu.yss.su/1/MorozIrina/mobile". trim($image_pass, ".");

            $conn->query("UPDATE themes SET image='{$image_path}' WHERE id='{$theme['id']}' ");
            header('Location: more.php?id='.$theme['id']);
        }
		else{
            echo errorBlockHtml();
            }

}

