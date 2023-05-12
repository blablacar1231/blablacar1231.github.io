<?php
session_start();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FA - Free Advertisement</title>
    <link rel="stylesheet" href="assets/css/main.css">
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
                <div class="menu">
                    <ul class="upper_ul">
                        <li><a href="./home.php">Мій профіль</a></li>
                        <li><a href="./dialogs.php">Мої повідомлення</a></li>
                    </ul>
                </div>
            </header>
        </div>
    </div>

    <div class="search">
        <div class="search_container">
            <div class="search-box">
                <input class="search-txt" type="text" name="search_input" placeholder="Type to search..">
                <button type="submit" class="search-button">Пошук</button>
            </div>
        </div>
    </div>

    <div class="categories">
        <h1 class="main_text"> Головні рубрики</h1>
        <div class="all_categories">
            <ul>
                <li id="bicycle_categorie" class="categorie">
                    <img class="categories_photo" src="./assets/css/bicycle.png">
                    <p>Вело</p>
                </li>
                <li  id="hobby_categorie"  class="categorie">
                    <img class="categories_photo" src="./assets/css/hobby.png">
                    <p>Хобі</p>
                </li>
                <li  id="fashion_categorie"  class="categorie">
                    <img class="categories_photo" src="./assets/css/fashion.png">
                    <p>Мода і стиль</p>
                </li>
                <li  id="auto_categorie"  class="categorie">
                    <img class="categories_photo" src="./assets/css/car.png">
                    <p>Авто</p>
                </li>
                <li  id="electronics_categorie"  class="categorie">
                    <img class="categories_photo" src="./assets/css/electronics.png">
                    <p>Електроніка</p>
                </li>
                <li  id="house_categorie"  class="categorie">
                    <img class="categories_photo" src="./assets/css/house.png">
                    <p>Дім та сад</p>
                </li>
                <li  id="pets_categorie"  class="categorie">
                    <img class="categories_photo" src="./assets/css/dog.png">
                    <p>Тварини</p>
                </li>
                <li  id="job_categorie"  class="categorie">
                    <img class="categories_photo" src="./assets/css/job.png">
                    <p>Робота</p>
                </li>
                <li  id="work_categorie"  class="categorie">
                    <img class="categories_photo" src="./assets/css/work.png">
                    <p>Бізнес та послуги</p>
                </li>
                <li  id="house2_categorie"  class="categorie">
                    <img class="categories_photo" src="./assets/css/house2.png">
                    <p>Нерухомість</p>
                </li>
                <li  id="kids_categorie"  class="categorie">
                    <img  class="categories_photo"src="./assets/css/kids.png">
                    <p>Дитячий світ</p>
                </li>
                <li  id="rent_categorie"  class="categorie">
                    <img class="categories_photo" class="rent" src="./assets/css/rent.png">
                    <p>Оренда</p>
                </li>
            </ul>
        </div>
    </div>

    <script src="./vendor/js/jquery-3.6.4.js"></script>
    <script src="./vendor/js/script.js"></script>
</body>
</html>