<?php
        session_start();
        require_once 'connect.php';
        
        $my_id = $_SESSION["user"]["id"];
        $id_with_chat = $_SESSION["id_with_chat"];
        $message = $_POST["input_text"];

        mysqli_query($connect, "INSERT INTO `messages` (`id`, `id_owner`, `id_receiver`, `message`) VALUES (NULL, '$my_id', '$id_with_chat', '$message')");

        $response = [
            "status" => true
        ];
    
        echo json_encode($response);

?>