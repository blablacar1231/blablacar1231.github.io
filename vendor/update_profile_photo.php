<?php

    session_start();
    require_once 'connect.php';

    $id_owner = $_SESSION['user']['id'];

    $path = './photos/' . time() . $_FILES['picture']['name'];
    if (!move_uploaded_file($_FILES['picture']['tmp_name'], '../' . $path)) {
        $_SESSION['message'] = 'Помилка у вивантаженні повідомлення';
        header('Location: ../home.php');
    }

    $_SESSION["user"]["picture"] = $path;

    mysqli_query($connect, "UPDATE users SET picture = '$path' WHERE id = '$id_owner'");

    header('Location: ../home.php');

?>