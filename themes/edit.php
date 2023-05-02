<?php
include "../mysql/mysql.php";
include "../mysql/menu.php";

$result = $conn->query("SELECT * from themes WHERE id='{$_GET['id']}' ");
while($row = $result->fetch_array())
        {
    //echo "<h1>".$row['title']."</h1>";
    //echo "<img src='".$row['image']."'>";
    //echo "<p>".$row['text']."</p>";

?>

<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style/style.php" media="screen">
    <title>Редактирование статьи <?=$row['title']?></title>
</head>
<script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>
<body class="body-form">
<div>
    <form class="decor" method="post" action="edit_script.php?id=<?=$_GET?>"  enctype="multipart/form-data">
        <div class="form-inner">
            <h4>Редактировать статью</h4>
            <input type="text" name="title" value="<?=$row['title']?>"><br>
            <input type="hidden" name="old_title" value="<?=$row['title']?>">
            <div class="input-file-row" >
                <label class="input-file">
                    <input type="file" name="image" class="image" multiple accept="image/*" onchange="changeImage(this)">
                    <span>Загрузить картинку</span>
                </label>
                <div class="input-file-list">
                    <?php
                    if(@getimagesize($row['image'])){
                        ?>
                        <div class="input-file-list-item">
                            <div><img src="<?=$row['image']?>" class="image-file"></div>
                            <span class="input-file-list-name"><?=$row['image']?></span>
                            <a href="#" onclick="removeImageTheme(this)" class="input-file-list-remove">x</a>
                        </div>
                        <input type="hidden" name="delete_image" id="delete_image" value="false">
                        <?php
                    }
                    ?>
                </div>
            </div><br><br>
            <a id="button-a" href="#" class="style-a">Абзац</a>
            <a id="button-h1" href="#" class="style-a">Заголовок</a>
            <a id="button-b" href="#" class="style-a"><b>Жирный</b></a>
            <a id="button-i" href="#" class="style-a"><i>Курсив</i></a><br><br>
            <textarea name='text' id="control" rows="6"><?=$row['text']?></textarea><br>
            <input type="submit" value="Отправить">
        </div>
    </form>
</div>
</body>
<script src="../javascript/add_tag.js"></script>
<script src="../javascript/image.js"></script>
</html>
            <?php
            }
//    $result->free();

?>


