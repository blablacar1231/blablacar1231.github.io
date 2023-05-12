<?php
    session_start();
    require_once 'connect.php';

    $id_post = $_POST['id_post'];
    $id_owner = $_SESSION['user']['id'];

    $check_post = mysqli_query($connect, "SELECT `id` FROM `favourites` WHERE id_post = '$id_post' AND id_owner = '$id_owner'");

    if (mysqli_num_rows($check_post) > 0) {

        mysqli_query($connect, "DELETE FROM `favourites` WHERE id_post = '$id_post' AND id_owner = '$id_owner'");

    } else {
        mysqli_query($connect, "INSERT INTO `favourites` (`id`, `id_owner`, `id_post`) VALUES (NULL, '$id_owner', '$id_post')");
    }
    $response = [
        "status" => true
    ];

    echo json_encode($response);
?>