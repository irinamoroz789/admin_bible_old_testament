<?php
require_once __DIR__ . '/boot.php';

$user = null;

if (check_auth()) {
    // Получим данные пользователя по сохранённому идентификатору
    $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `id` = :id");
    $stmt->execute(['id' => $_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    header('Location: mysql/home.php');

}
?>
<?php if (!$user) { ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/style.php" media="screen">
    <title>Регистрация</title>
</head>
<body class="body-form">
<div class="form-inner">
    <h5>Регистрация</h5>
    <?php flash(); ?>

    <form method="post" class="decor" action="do_register.php">
        <br>
        <h1>Логин</h1>
        <div class="input-type"><input type="text" id="username" name="username" required></div>
        <h1>Пароль</h1>
        <div class="input-type"><input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="submit-type"><input type="submit" value="Отправить"></div>
        <br>
    </form>
</body>
<html>
<?php } ?>
