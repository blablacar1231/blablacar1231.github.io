<?php
require('./config.php');
# the createAuthUrl() method generates the login URL.
$login_url = $client->createAuthUrl();
/* 
 * After obtaining permission from the user,
 * Google will redirect to the login.php with the "code" query parameter.
*/
if (isset($_GET['code'])):

  session_start();
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $_SESSION['token'] = $token;
  header('Location: home.php');
  exit;

endif;
?>

<!doctype html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FA - Free Advertisement</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/main2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
                            <a href="./register.php">Зараєструватися</a>
                        </li>
                    </ul>
                </div>
            </header>
        </div>
    </div>

    <form class="main_form">
        <label>Ваш логін:</label>
        <input type="text" name="login" placeholder="Введіть свій логін">
        <label>Ваш пароль:</label>
        <input type="password" name="password" placeholder="Введіть свій пароль">
        <button type="submit" class="login-btn">Увійти</button>
        <a href="<?= $login_url ?>"><img src="./uploads/sign-in-with-google.png" class="sign_in_google" alt="Google Logo"></a>
        <p class="login_paragraph">
            У вас нема аккаунта? - <a href="./register.php">зареєструйтеся</a>!
        </p>
        <p class="login_paragraph">
            Ви забули пароль? - <a href="./password_recovery.php">відновіть його</a>!
        </p>
        <p class="msg hidden">Lorem ipsum dolor sit amet.</p>
    </form>

    <script src="./vendor/js/jquery-3.6.4.js"></script>
    <script src="./vendor/js/script.js"></script>
</body>
</html>