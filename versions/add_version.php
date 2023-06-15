<?php
include "../mysql/mysql.php";
header("Content-type: text/html; charset=utf-8");
if (isset($_POST)) {

    date_default_timezone_set("Europe/Moscow");
    $date = date("Y-m-d H:i:s");
    $conn->query("INSERT INTO app_version (version, created_at) VALUES ('{$_POST["version"]}', '{$date}')");
    header('Location: table_versions.php');
}
