<?php
include "mysql.php";
include "menu.php";

$result = $conn->query("SELECT * from themes WHERE id='".$_GET['id']."'");
while($row = $result->fetch_array(MYSQLI_ASSOC))
        {
    //echo "<h1>".$row['title']."</h1>";
    //echo "<img src='".$row['image']."'>";
    //echo "<p>".$row['text']."</p>";

?>

<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.php" media="screen">
</head>
<body class="body-form">
<div>
    <form class="decor" action='edit_script.php?id=<?=$_GET['id']?>' method='POST'>
        <div class="form-inner">
            <h3>Редактировать статью</h3>
        <input type='text' name='title' value='<?=$row['title']?>'></br>
        <input type='text' name='image' value='<?=$row['image']?>'></br>
        <textarea name='text' rows="6"><?=$row['text']?></textarea></br>
        <input type="submit" value="Отправить">
            </div>
    </form>
            </div>
            </body>
        </html>

            <?php

            }

?>

<!--    <a href="table.php">Назад</a>-->

<?php

$result->free();

?>
