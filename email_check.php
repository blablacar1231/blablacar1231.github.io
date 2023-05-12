<?php

    session_start();
    require_once 'connect.php';

    $email = $_POST['email'];

    $check_user = mysqli_query($connect, "SELECT email FROM users WHERE email = '$email'");

    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);

            $length = 10;
            $chars = 'qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP'; 
            $letters = '1234567890'; 
            $size = strlen($chars) - 1; 
            $password = ''; 
            while($length--) {
                $password .= $chars[random_int(0, $size)]; 
                $password .= $letters[random_int(0, $size)]; 
            }

            $password2 = md5($password);

            mysqli_query($connect, "UPDATE users SET password = '$password2' WHERE email = '$email'");

        $subject = "Відновлення пароля на Free Advertisements";
        $txt = "Доброго дня, ви хотіли відновити ваш пароль, тому вам прийшов цей лист.\n
                Ваш новий пароль: $password";
        $headers = "From: webmaster@example.com" . "\r\n" .
        "CC: somebodyelse@example.com";
        
        mail($email,$subject,$txt,$headers);
        header('Location: ../main.php');

    } else {
        $_SESSION['message'] = 'Виникла помилка, перевірте правильність введених даних';
        header('Location: ../password_recovery.php');
    }

?>