<?php
    session_start();

    $input_text = $_POST['input_text'];

    $_SESSION['input_text'] = $input_text;

    $response = [
        "status" => true
    ];

    echo json_encode($response);
    ?>