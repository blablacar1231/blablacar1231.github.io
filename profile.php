<?php
include('config.php');

  require('./config.php');
  
  $client->setAccessToken($_SESSION['token']);
  
  if($client->isAccessTokenExpired()){
    header('Location: logout.php');
    exit;
  }
  $google_oauth = new Google_Service_Oauth2($client);
  $user_info = $google_oauth->userinfo->get();
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
                        <li><a href="./all_advertisements.php">Всі оголошення</a></li>
                        <li><a href="./account.php">Мої повідомлення</a></li>
                        <li><a href="vendor/logout.php">Вихід</a></li>
                    </ul>
                </div>
            </header>
        </div>
    </div>

    <?php
        echo "<ul>";
        echo "<li><img src='<?=" .$user_info . "['picture'];?>'></li>";
        echo "<li><strong>ID:</strong> <?=" .$user_info['id'] . ";?></li>";
        echo "<li><strong>Full Name:</strong> <?=" . $user_info['givenName'] . ";?> <?=" .$user_info['familyName'] . ";?></li>";
        echo "<li><strong>Email:</strong> <?=" . $user_info['email'] .";?></li>";
        echo "<li><a href='./logout.php'>Logout</a></li>";
        echo "</ul>";
    ?>
    <?php
        echo "<div class='profile_info'>";
        echo "<h1 class=''>Мій профіль:</h1>";
        echo "<div class='all_in_profile'>";
        echo"<img class='content_image content_image2' src='" . $_SESSION["user"]["picture"] . "'>";
        echo "<div class='info_in_profile'>";
        echo"<p class='profile_paragraph'>Ім'я : ". $_SESSION["user"]["full_name"] . "</p>";
        echo"<p class='profile_paragraph'>Логін : ". $_SESSION["user"]["login"] . "</p>";
        echo"<p>Електронна адреса : ". $_SESSION["user"]["email"] . "</p>";
        echo"<p>Номер телефона : ". $_SESSION["user"]["telephone_number"] . "</p>";
        echo"<button class='update_profile_button'  onclick='update_profile(`info`)')'>Редагувати інформацію</button>";
        echo"<button class='update_profile_button margin_left_button'  onclick='update_profile(`photo`)')'>Редагувати фотогрфію профіля</button>";
        echo "</div>";
        echo "</div>";
        echo"</div>";
    ?>

    <form action="vendor/update_profile.php" method="post" enctype="multipart/form-data" id="update_profile" class="hidden main_form3">
        <div class="form_in">
            <div class="form_label">
                Ім'я та фамілія
            </div>
            <input class="form_input" type="text" name="full_name" maxlength="75" placeholder="Введіть нові ім'я та фамілію">
            <div class="form_label">
                Номер телефона
            </div>
            <input class="form_input" type="text" name="telephone_number" maxlength="75" placeholder="Введіть новий телефон">
        </div>
        <button type="submit" onclick="close_form()">Обновити інформацію</button>
    </form>

    <form action="vendor/update_profile_photo.php" method="post" enctype="multipart/form-data" id="update_profile_photo" class="hidden main_form3">
        <div class="form_in">
            <div class="form_label">
                Нова фотографія
            </div>
            <input class="form_input" type="file" name="picture">
        </div>
        <button type="submit" onclick="close_form()">Обновити інформацію</button>
    </form>

    <div class="my_content">
        <h1 class="">Мої оголошення</h1>
    </div>
    <div class="add_post">
        <button class="post_button" onclick="close_form('add_func')">
            Додати оголошення
        </button>
        <button class="post_button reset_button" onclick="close_form('reset_func')">
            Редагувати оголошення
        </button>
        <button class="post_button remove_button"  onclick="close_form('remove_func')">
            Видалити оголошення
        </button>
    </div>
    <pre>
</pre>
    <form action="vendor/add_post.php" method="post" enctype="multipart/form-data" id="add_form" class="hidden main_form3">
        <div class="form_in">
            <div class="form_label">
                Назва товару
            </div>
            <input class="form_input" type="text" name="text" maxlength="75" placeholder="Введіть назву товару">
            <div class="form_label">
                Опис товару
            </div>
            <textarea class="form_textarea" name="info" maxlength="250" rows="4" cols="50" placeholder="Введіть опис товару"></textarea>
            <div class="form_label">
                Місто
            </div>
            <select name="city" class="form_select">
                <option value="Київ">Київ</option>
                <option value="Львів">Львів</option>
                <option value="Харків">Харків</option>
                <option value="Одесса">Одесса</option>
            </select>
            <div class="form_label">
                Тип товару
            </div>
            <select name="type" class="form_select">
                <option value="Вело">Вело</option>
                <option value="Хобі">Хобі</option>
                <optgroup label="Авто">
                    <option value="Бензиновий автомобіль">Бензиновий автомобіль</option>
                    <option value="Дизильний автомобіль">Дизильний автомобіль</option>
                    <option value="Електричний автомобіль">Електричний автомобіль</option>
                </optgroup>
            </select>
            <div class="form_label">
                Ціна
            </div>
            <input class="form_input" type="text" name="price" placeholder="Введіть ціну товару">
            <div class="form_label">
                Фотографія товару
            </div>
            <input class="form_input" type="file" name="picture">
        </div>
        <button type="submit" onclick="close_form()">Завантажити товар</button>
    </form>
    <form action="vendor/reset_post.php" method="post" enctype="multipart/form-data" id="reset_form" class="hidden main_form3">
    <?php
            $connect = mysqli_connect('localhost', 'root', '', 'fa_database');
            if($connect->connect_error){
                die("Помилка: " . $connect->connect_error);
            }
            $id_owner = $_SESSION['user']['id'];
            $sql = "SELECT * FROM `posts` WHERE `id_owner` = '$id_owner'";
            if($result = $connect->query($sql)){
                $rowsCount = $result->num_rows;
                echo "<div class='margin_left'> Виберіть оголошення:</div>";
                echo "<select name='select_item_to_reset' class='form_select form_select2'>";
                foreach($result as $row){
                    echo "<option value='" . $row["text"] . "'>" . $row["text"] . "</option>";
                }
                echo "</select>";
                $result->free();
            } else{
                echo "Помилка: " . $connect->error;
            }
            $connect->close();
        ?>
        <div class="form_in">
            <div class="form_label">
                Назва товару
            </div>
            <input class="form_input" type="text" name="text" maxlength="75" placeholder="Введіть назву товару">
            <div class="form_label">
                Опис товару
            </div>
            <textarea class="form_textarea" name="info" maxlength="250" rows="4" cols="50" placeholder="Введіть опис товару"></textarea>
            <div class="form_label">
                Місто
            </div>
            <select name="city" class="form_select">
                <option value="Київ">Київ</option>
                <option value="Львів">Львів</option>
                <option value="Харків">Харків</option>
                <option value="Одесса">Одесса</option>
            </select>
            <div class="form_label">
                Тип товару
            </div>
            <select name="type" class="form_select">
                <option value="Вело">Вело</option>
                <option value="Хобі">Хобі</option>
                <optgroup label="Авто">
                    <option value="Бензиновий автомобіль">Бензиновий автомобіль</option>
                    <option value="Дизильний автомобіль">Дизильний автомобіль</option>
                    <option value="Електричний автомобіль">Електричний автомобіль</option>
                </optgroup>
            </select>
            <div class="form_label">
                Ціна
            </div>
            <input class="form_input" type="text" name="price" placeholder="Введіть ціну товару">
            <div class="form_label">
                Фотографія товару
            </div>
            <input class="form_input" type="file" name="picture">
        </div>
        <button type="submit" onclick="close_form()">Оновити оголошення</button>
    </form>
    <form action="vendor/remove_post.php" method="post" enctype="multipart/form-data" id="remove_form" class="hidden main_form3">
    <?php
            $connect = mysqli_connect('localhost', 'root', '', 'fa_database');
            if($connect->connect_error){
                die("Помилка: " . $connect->connect_error);
            }
            $id_owner = $_SESSION['user']['id'];
            $sql = "SELECT * FROM `posts` WHERE `id_owner` = '$id_owner'";
            if($result = $connect->query($sql)){
                $rowsCount = $result->num_rows;
                echo "<div> Виберіть оголошення:</div>";
                echo "<select name='select_item_to_reset' class='form_select'>";
                foreach($result as $row){
                    echo "<option value='" . $row["text"] . "'>" . $row["text"] . "</option>";
                }
                echo "</select>";
                $result->free();
            } else{
                echo "Помилка: " . $connect->error;
            }
            $connect->close();
        ?>
        <button type="submit" onclick="close_form()">Видалити оголошення</button>
    </form>
    <?php
            $connect = mysqli_connect('localhost', 'root', '', 'fa_database');
            if($connect->connect_error){
                die("Помилка: " . $connect->connect_error);
            }
            $id_owner = $_SESSION['user']['id'];
            $sql = "SELECT * FROM `posts` WHERE `id_owner` = '$id_owner'";
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
                            echo "<div><img src='./assets/css/heart-solid.svg'></div/";
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