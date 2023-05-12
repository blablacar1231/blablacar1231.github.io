<?php

    $connect = mysqli_connect('localhost', 'root', '', 'fa_database');

    if (!$connect) {
        die('Error connect to DataBase');
    }