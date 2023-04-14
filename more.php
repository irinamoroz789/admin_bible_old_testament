<?php
include "mysql.php";
include "menu.php";

$result = $conn->query("SELECT * from themes WHERE id='".$_GET['id']."'");
foreach($result as $row)
{
    ?>

<!--    echo "<h1>".$row['title']."</h1>";-->
<!--    echo "<img src='".$row['image']."'>";-->
<!--    echo "<p>".$row['text']."</p>";-->
    <!DOCTYPE HTML>
    <html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.php" media="screen">
    </head>
    <body>
    <div class="text">
    <h1 class="title"><?=$row['title']?></h1>
        <div class="box">
    <img src="<?=$row['image']?>" class="image-width">
        </div>
    <p><?=$row['text']?></p>


    </div>
    </body>
</html>

<?php

}
?>

