<?php
    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = $_POST['password'];
    
    $error_fields = [];
    
    if ($login === '') {
        $error_fields[] = 'login';
    }
    
    if ($password === '') {
        $error_fields[] = 'password';
    }
    
    if (!empty($error_fields)) {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Заповніть всі поля!",
            "fields" => $error_fields
        ];
    
        echo json_encode($response);
    
        die();
    }

    $password = md5($password);

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "full_name" => $user['full_name'],
            "login" => $user['login'],
            "picture" => $user['picture'],
            "telephone_number" => $user['telephone_number'],
            "email" => $user['email']
        ];

        $response = [
            "status" => true
        ];

        echo json_encode($response);

    } else {
        $response = [
            "status" => false,
            "message" => 'Логін або пароль неправильні!'
        ];
        echo json_encode($response);
    };
    ?>