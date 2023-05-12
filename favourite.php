<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: home.php');
}

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>FA - Free Advertisement</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/main2.css">
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
                        <li><a href="vendor/logout.php">Вихід</a></li>
                    </ul>
                </div>
            </header>
        </div>
    </div>

    <?php
            $connect = mysqli_connect('localhost', 'root', '', 'fa_database');
            if($connect->connect_error){
                die("Помилка: " . $connect->connect_error);
            }
            $id_owner = $_SESSION['user']['id'];
            $sql = "SELECT posts.id, posts.id_owner, posts.text, posts.info, posts.photo, posts.city, posts.type, posts.price, posts.date FROM posts INNER JOIN favourites ON posts.id = favourites.id_post WHERE favourites.id_owner = $id_owner";
            if($result = $connect->query($sql)){
                $rowsCount = $result->num_rows;
                foreach($result as $row){
                    echo "<div class='content_main'>";
                        echo "<div class='content_photo'>";
                            echo "<img class='content_image' src='" . $row["photo"] . "'>";
                        echo "</div>";
                        echo "<div class='text_content'>";
                            echo "<p class='content_text'>" . $row["text"] . "</p>";
                            echo "<p class='content_info'>" . $row["info"] . "</p>";
                            echo "<p class='text_comment'>" . $row["city"] . " - " . date("d-m-Y",strtotime($row["date"])) ."</p>";
                            echo "<p class='text_comment'>" . $row["type"] . "</p>";
                        echo "</div>";
                        echo "<div class='content_price'>";
                            echo $row["price"] . " грн.";
                            echo "<img id='" . $row["id"] . "' class='heart' src='./assets/css/heart-solid.svg'>";
                        echo "</div>";
                    echo "</div>";
                }
                $result->free();
            } else{
                echo "Помилка: " . $connect->error;
            }
            $connect->close();
        ?>

</body>
<script src="./vendor/js/jquery-3.6.4.js"></script>
<script src="./vendor/js/script.js"></script>
</html>