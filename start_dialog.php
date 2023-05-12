<?php
        session_start();
        require_once 'connect.php';
        
        $my_id = $_SESSION["user"]["id"];
        $id_with_chat = $_POST["id_post"];
        $product_title = $_POST["product_title"];

        $check_user = mysqli_query($connect, "SELECT id_owner FROM posts WHERE id = '$id_with_chat'");

        if (mysqli_num_rows($check_user) > 0) {
    
            $user = mysqli_fetch_assoc($check_user);

            $_SESSION["user_chat"] = $user["id_owner"];

            if($my_id === $user["id_owner"]) {
                $response = [
                    "status" => false
                ];
            } else {
                $_SESSION["id_with_chat"] = $user["id_owner"];
                $id_receiver = $user["id_owner"];

                $check_dialog = mysqli_query($connect, "SELECT * FROM `dialogs` WHERE (id_first = $my_id AND id_second = $id_receiver) OR (id_first = $id_receiver AND id_second = $my_id)");

                if (mysqli_num_rows($check_dialog) > 0) {

                } else {
                    mysqli_query($connect, "INSERT INTO `dialogs` (`id`, `id_first`, `id_second`, `title`) VALUES (NULL, '$my_id', '$id_receiver', '$product_title')");
                }
                $response = [
                    "status" => true
                ];
            }
        }
    
        echo json_encode($response);

?>