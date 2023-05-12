<?php
        session_start();
        require_once 'connect.php';
        
        $my_id = $_SESSION["user"]["id"];
        $id_with_chat = $_POST["id_with_chat"];
        $_SESSION["id_with_chat"] = $id_with_chat;

        $response = [
            "status" => true
        ];

        echo json_encode($response);

?>