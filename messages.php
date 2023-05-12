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
                        <li><a href="./messages.php">Мої повідомлення</a></li>
                        <li><a href="./logout.php">Вихід</a></li>
                    </ul>
                </div>
            </header>
        </div>
    </div>


    <div> 
    </div>
    <?php
        $my_id = $_SESSION["user"]["id"];
        $id_with_chat = $_SESSION["id_with_chat"];

        $connect = mysqli_connect('localhost', 'root', '', 'fa_database');
        if($connect->connect_error){
            die("Помилка: " . $connect->connect_error);
        }
        $sql = "SELECT * FROM `messages` WHERE (id_owner = $my_id AND id_receiver = $id_with_chat) OR (id_owner = $id_with_chat AND id_receiver = $my_id)";
        if($result = $connect->query($sql)){
            $rowsCount = $result->num_rows;
            echo "<div class='chat'>";
            foreach($result as $row){
                if ($my_id == $row["id_owner"]) {
                    echo "<p class='my_message'>" . $row["message"] . "</p>";
                } else {
                    echo "<p class='not_my_message'>" . $row["message"] . "</p>";
                }
            }
            echo "</div>";
            $result->free();
        } else{
            echo "Помилка: " . $connect->error;
        }
        $connect->close();
    ?>
    <div class="send_input">
        <input class="chat_input" name="chat_input" placeholder="Введіть повідомлення...">
        <div class="chat_button">Надіслати повідомлення</div>
    </div>


</body>
<script src="./vendor/js/jquery-3.6.4.js"></script>
<script type="text/javascript" src="./vendor/js/script.js"></script>
<script type="text/javascript" src="./vendor/js/messages.js"></script>
</html>