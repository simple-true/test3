<?php
$connection = mysqli_connect('localhost', 'root', '', 'test_db'); 
if ($connection == false)
{
    echo 'Не удалось подключиться к базе данных! Сходи покури, может само заработает.';
    echo mysqli_connect_error();
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <title>Test page</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
</head>
<body>
<div class="container">
    <img src="./image2.png" alt="" class="articles">
    <div class="slider slick-slider">
        <?php
        $result = mysqli_query($connection, "SELECT * FROM `articles`");
        while (($record = mysqli_fetch_assoc($result)) )
        {
         ?> 
         <div class="box">
            <div class="box-inner">
                <img src="<?php 
                echo $record['img'] ?>" alt="">
                <div class="title">
                    <h3><?php 
                        echo $record['title'] ?></h3>
                    <span><?php 
                    echo date('d.m.Y', strtotime($record['pubdate']));?></span>
                </div>
                <p><?php 
                echo $record['text'] ?></p>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="script.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
</body>
</html>