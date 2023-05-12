<?php

    session_start();
    require_once 'connect.php';

    $full_name = $_POST['full_name'];
    $telephone_number = $_POST['telephone_number'];
    $id_owner = $_SESSION['user']['id'];

    if (!move_uploaded_file($_FILES['picture']['tmp_name'], '../' . $path)) {
        $_SESSION['message'] = 'Помилка у вивантаженні повідомлення';
        header('Location: ../home.php');
    }

    $_SESSION["user"]["full_name"] = $full_name;
    $_SESSION["user"]["telephone_number"] = $telephone_number;

    mysqli_query($connect, "UPDATE users SET full_name = '$full_name', telephone_number = '$telephone_number' WHERE id = '$id_owner'");

    header('Location: ../home.php');

?>