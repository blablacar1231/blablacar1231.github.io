<?php

    session_start();
    require_once 'connect.php';

    $text = $_POST['text'];
    $info = $_POST['info'];
    $city = $_POST['city'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $id_owner = $_SESSION['user']['id'];

    $path = './photos/' . time() . $_FILES['picture']['name'];
    if (!move_uploaded_file($_FILES['picture']['tmp_name'], '../' . $path)) {
        $_SESSION['message'] = 'Помилка у вивантаженні повідомлення';
        header('Location: ../home.php');
    }

    mysqli_query($connect, "INSERT INTO `posts` (`id`, `id_owner`, `photo`, `text`, `info`, `city`, `type`, `price`) VALUES (NULL, '$id_owner', '$path', '$text', '$info', '$city', '$type', '$price')");

    header('Location: ../home.php');

?>