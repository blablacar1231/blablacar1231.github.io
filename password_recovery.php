<?php
session_start();

if (isset($_SESSION['user'])) {
    header('Location: profile.php');
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
                <div class="menu">
                    <ul class="upper_ul">
                        <li><a href="./main.php">Увійти</a></li>
                        <li>
                            <a href="./register.php">Зараєструватися</a>
                        </li>
                    </ul>
                </div>
            </header>
        </div>
    </div>

    <form action="vendor/email_check.php" method="post" enctype="multipart/form-data" id="add_form" class="main_form">
        <label>Ваша електронна адреса:</label>
        <input type="text" name="email" placeholder="Введіть свою електронну адресу">
        <button type="submit" >Відновити пароль</button>
    </form>
    <?php
            if (isset($_SESSION['message'])) {
                echo '<p class="error_message"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>

    <script src="./vendor/js/jquery-3.6.4.js"></script>
    <script src="./vendor/js/script.js"></script>
</body>
</html>