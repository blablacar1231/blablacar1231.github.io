<?php
        session_start();
        if(!isset($_SESSION['token']) AND !isset($_SESSION['user']['login'])) {
            header('Location: login.php');
        }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FA - Free Advertisement</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/main2.css">
    <link rel="stylesheet" href="assets/css/dialogs.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bruno+Ace+SC&display=swap" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="center">
            <header class="header">
                <div class="text">
                    FA - Free Advertisement 
                </div>
                <div class="menu_profile">
                    <ul class="upper_ul">
                        <li><a href="./all_advertisements.php">Всі оголошення</a></li>
                        <li><a href="./dialogs.php">Мої повідомлення</a></li>
                        <li><a href="./logout.php">Вихід</a></li>
                    </ul>
                </div>
            </header>
        </div>
    </div>


    <div class='my_chats'> 
        Мої чати: 
    </div>
    <?php
        $my_id = $_SESSION["user"]["id"];
        $connect = mysqli_connect('localhost', 'root', '', 'fa_database');
        if($connect->connect_error){
            die("Помилка: " . $connect->connect_error);
        }
        $sql = "SELECT * FROM `dialogs` WHERE id_first = $my_id OR id_second = $my_id";
        if($result = $connect->query($sql)){
            $rowsCount = $result->num_rows;
            echo "<div class='dialog_list'>";
            foreach($result as $row){
                if ($my_id == $row["id_first"]) {
                    $id_with_chat = $row["id_second"];
                } else {
                    $id_with_chat = $row["id_first"];
                }
                $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$id_with_chat'");
                $user = mysqli_fetch_assoc($check_user);
                echo "<div class='dialog_main' id='" . $user["id"] . "'>";
                echo "<img class='dialog_picture' src ='" . $user["picture"] . "'>";
                echo "<p class='dialog_paragraph'>" . $user["full_name"] . "<br><br>";
                echo "<span id='title_dialog'>" . $row["title"] . "</span><br>";
                echo "</div>";
            }
            echo "</div>";
            $result->free();
        } else{
            echo "Помилка: " . $connect->error;
        }
        $connect->close();
    ?>

</body>
<script src="./vendor/js/jquery-3.6.4.js"></script>
<script type="text/javascript" src="./vendor/js/script.js"></script>
</html>