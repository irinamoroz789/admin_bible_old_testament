<?php
include "mysql.php";
if($conn->query("UPDATE themes SET title='".$_POST['title']."', image='".$_POST['image']."', text='".$_POST['text']."' WHERE id='".$_GET['id']."' ")) {
    echo "Статья обновлена";
} else {
    echo "Что-то пошло не так...";
}
?>
</br><a href="table.php">Назад</a>