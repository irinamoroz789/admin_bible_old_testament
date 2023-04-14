<?php
    include "mysql.php";
    include "upload.php";
    header("Content-type: text/html; charset=utf-8");
	if(isset($_POST)){

        //echo $_POST['title']."<BR>";
        //echo $_POST['image']."<BR>";
        //echo $_POST['text']."<BR>";
        $image_path = saveThemesImage("image",  $_POST["title"]);

		$conn->query("INSERT INTO themes (title, image, text) VALUES ('{$_POST["title"]}', '{$image_path}', '{$_POST["text"]}')");
		header('Location: table.php');
	}
?>
<!--</br><a href="index.php">Главная</a>-->