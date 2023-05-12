<?php
    session_start();

    $categorie = $_POST['categorie'];

    switch ($categorie) {
        case 'bicycle_categorie':
            $_SESSION['categorie'] = 'Вело';
        break;
        case 'hobby_categorie':
            $_SESSION['categorie'] = 'Хобі';
        break;
        case 'fashion_categorie':
            $_SESSION['categorie'] = 'Мода';
        break;
        case 'auto_categorie':
            $_SESSION['categorie'] = 'автомобіль';
        break;
        case 'electronics_categorie':
            $_SESSION['categorie'] = 'Електроніка';
        break;
        case 'house_categorie':
            $_SESSION['categorie'] = 'Дім';
        break;
        case 'pets_categorie':
            $_SESSION['categorie'] = 'Тварини';
        break;
        case 'job_categorie':
            $_SESSION['categorie'] = 'Робота';
        break;
        case 'work_categorie':
            $_SESSION['categorie'] = 'Бізнес';
        break;
    }

    $response = [
        "status" => true
    ];

    echo json_encode($response);
    ?>