<?php
session_start();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FA - Free Advertisement</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/main2.css">
    <script type="text/javascript" src="./vendor/js/script.js"></script>
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
                        <li><a href="./home.php">Мій профіль</a></li>
                        <li><a href="./dialogs.php">Мої повідомлення</a></li>
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
            $sql = "SELECT * FROM `posts` WHERE text LIKE '%{$_SESSION['input_text']}%'";
            echo "<div class='search_info_1'> Всі оголошення за запитом : " . "<div class='search_info_2'> " .$_SESSION['input_text'] . "</div>" . "</div>";
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
</html>