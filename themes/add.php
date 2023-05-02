<?php
    include "../mysql/mysql.php";
    include "../javascript/upload.php";
    include "../mysql/menu.php";
    header("Content-type: text/html; charset=utf-8");
	if(isset($_POST)){

        $image_path = saveThemesImage("image",  $_POST["title"]);
        // $image_pass = "http://pstgu.yss.su/1/MorozIrina/mobile". trim($image_pass, ".");
        $text = rtrim($_POST["text"], ",");

		if($conn->query("INSERT INTO themes (title, image, text) VALUES ('{$_POST["title"]}', '{$image_path}', '{$text}')")){
        $result = $conn->query("SELECT * from themes WHERE title='{$_POST["title"]}' ");
        $theme = $result->fetch_assoc();
            header('Location: more.php?id='.$theme['id']);
        }
		else{
            echo errorBlockHtml();
            }

}

