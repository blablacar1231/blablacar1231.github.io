<?php

    session_start();
    require_once 'connect.php';

    $full_name = $_POST['full_name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $telephone_number = $_POST['telephone_number'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password && $full_name && $login && $email && $telephone_number && $password_confirm !== "" ) {

        if ($password === $password_confirm) {

            if (!preg_match('/[^A-Za-z0-9]/', $login) && !preg_match('/[^A-Za-z0-9]/', $password)) {

                if (preg_match('/[A-Z]/', $password)) {

                    $string = $password;
                    $count  = strlen(preg_replace('/[^\d]/','',$string));

                    if ($count >= 3) {

                        $check_login = mysqli_query($connect, "SELECT 'login' FROM `users` WHERE `login` = '$login'");

                        if (mysqli_num_rows($check_login) === 0) {

                            $check_email = mysqli_query($connect, "SELECT 'email' FROM `users` WHERE `login` = '$email'");

                            if (mysqli_num_rows($check_email) === 0) {

                            $path = './uploads/' . time() . $_FILES['picture']['name'];
                            if (!move_uploaded_file($_FILES['picture']['tmp_name'], '../' . $path)) {
                                $_SESSION['message'] = 'Помилка у вивантаженні повідомлення';
                                header('Location: ../register.php');
                            }
                
                            $password = md5($password);
                
                            mysqli_query($connect, "INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `telephone_number`, `password`, `picture`) VALUES (NULL, '$full_name', '$login', '$email', '$telephone_number',  '$password', '$path')");
                
                            $_SESSION['message'] = 'Реєстрація пройшла успішно!';
                            header('Location: ../home.php');
                            } else {
                                $_SESSION['message'] = 'Цей емейл вже зайнятий';
                                header('Location: ../register.php');
                            }
                        } else {
                            $_SESSION['message'] = 'Цей логін вже зайнятий';
                            header('Location: ../register.php');
                        }
                    } else {
                        $_SESSION['message'] = 'Пароль має містити хоча б три цифри';
                        header('Location: ../register.php');
                    }
                } else {
                    $_SESSION['message'] = 'Пароль має містити хоча б одну велику літеру';
                    header('Location: ../register.php');
                }
            } else {
                $_SESSION['message'] = 'Логін і пароль мають містити букви тільки англійського алфавіту';
                header('Location: ../register.php');
            }
    } else {
        $_SESSION['message'] = 'Паролі не співпадають';
        header('Location: ../register.php');
    }

    } else {
        $_SESSION['message'] = 'Потрібно заповнити всі поля';
        header('Location: ../register.php');
    }

?>
