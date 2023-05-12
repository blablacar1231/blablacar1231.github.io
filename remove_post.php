<?php

    session_start();
    require_once 'connect.php';

    $text = $_POST['text'];
    $info = $_POST['info'];
    $city = $_POST['city'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $select_item_to_reset = $_POST['select_item_to_reset'];
    $id_owner = $_SESSION['user']['id'];

    $path = './photos/' . time() . $_FILES['picture']['name'];
    if (!move_uploaded_file($_FILES['picture']['tmp_name'], '../' . $path)) {
        $_SESSION['message'] = 'Помилка у вивантаженні повідомлення';
        header('Location: ../home.php');
    }

    mysqli_query($connect, "DELETE FROM posts WHERE text = '$select_item_to_reset'");

    header('Location: ../home.php');

?>