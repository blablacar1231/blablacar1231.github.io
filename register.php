<?php
    session_start();
    if (isset($_SESSION['user'])) {
        header('Location: profile1.php');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FA - Free Advertisement</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/main2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bruno+Ace+SC&display=swap" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="center">
            <header class="header">
                <div class="text">
                    FA - Free Advertisement 
                </div>
                <div class="menu2">
                    <ul class="upper_ul">
                        <li><a href="./login.php">Увійти</a></li>
                        <li>
                            <a href="./register.php">Зареєструватися</a>
                        </li>
                    </ul>
                </div>
            </header>
        </div>
    </div>

    <form action="vendor/signup.php" method="post" enctype="multipart/form-data" class="main_form2">
        <label>Ім'я</label>
        <input type="text" name="full_name" placeholder="Введіть своє ім'я">
        <label>Логін</label>
        <input type="text" name="login" placeholder="Введыть свій логін">
        <label>Пошта</label>
        <input type="email" name="email" placeholder="Введіть адресу своєї пошти">
        <label>Телефон</label>
        <input type="text" name="telephone_number" placeholder="Введіть свій номер телефону">
        <label>Фотографія профілю</label>
        <input type="file" name="picture">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введіть пароль">
        <label>Підтвердження пароля</label>
        <input type="password" name="password_confirm" placeholder="Підтвердіть пароль">
        <button type="submit">Зареєструватися</button>
        <p>
            У вас вже є аккаунт? - <a href="main.php">авторизуйтеся</a>!
        </p>
        <?php
            if (isset($_SESSION['message'])) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>

</body>
</html>