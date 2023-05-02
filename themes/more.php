<?php
include "../mysql/mysql.php";
include "../mysql/menu.php";

$result = $conn->query("SELECT * from themes WHERE id='{$_GET['id']}'");
foreach($result as $theme)
{
    $text = explode( '",', $theme['text']);

    ?>

    <!DOCTYPE HTML>
    <html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../style/style.php" media="screen">
        <title><?=$theme['title']?></title>
    </head>
    <body>
    <div class="text">
        <h1 class="title"><?=$theme['title']?></h1>
        <?php
        if(@getimagesize($theme['image'])){
        ?>
        <div class="box">
            <img src="<?=$theme['image']?>" class="image-width">
        </div>
            <?php
        }

        foreach($text as $paragraph)
        {
            $paragraph = str_replace('"', '', $paragraph);

        ?>

        <p><?=$paragraph?></p>
        <?php
                            }
        ?>

    </div>
    </body>
</html>

<?php

}
?>

