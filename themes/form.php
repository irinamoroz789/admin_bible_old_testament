<?php
include "../mysql/menu.php";
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style/style.php" media="screen">
    <title>Добавить статью</title>
</head>
<script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>
<body class="body-form">
		<div>
			<form class="decor" action="add.php" method="post" enctype="multipart/form-data">
                <div class="form-inner">
                    <h4>Добавить статью</h4>
					<input type="text" name="title" placeholder="Заголовок"><br>
<!--					<input type="text" name="image" placeholder="URL-картинки"><br><br>-->
                    <div class="input-file-row" >
                        <label class="input-file">
                            <input type="file" name="image" class="image" multiple accept="image/*" onchange="changeImage(this)">
                            <span>Загрузить картинку</span>
                        </label>
                        <div class="input-file-list"></div>
                    </div><br><br>
                    <a id="button-a" href="#" class="style-a">Абзац</a>
                    <a id="button-h1" href="#" class="style-a">Заголовок</a>
                    <a id="button-b" href="#" class="style-a"><b>Жирный</b></a>
                    <a id="button-i" href="#" class="style-a"><i>Курсив</i></a><br><br>
                    <textarea placeholder="Текст..." name="text" id="control" rows="6"></textarea>
                    <input type="submit" value="Отправить">
                </div>
			</form>
		</div>
</body>
<script src="../javascript/add_tag.js"></script>
<script src="../javascript/image.js"></script>
</html>

