<?php

require_once ('config.php');

$login = $_POST['login'];
$password = $_POST['password'];

//Запрос к БД, для поиска существующего пользователя
$sql = "SELECT * FROM `users_log_reg` WHERE login = '$login' AND password = '$password'";
$result = $conn->query($sql);

//Проверка введенных данных
if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()){
        echo "Добро пожаловать " . $row['login'];
        echo "<br/> Перенаправляю вас на сайт.";
        header('Refresh: 5; URL=/dogs_images.php');
    }
} else {
    echo "Логин или пароль введены неверно!";
    header('Refresh: 5; URL=/index.php');
}
?>