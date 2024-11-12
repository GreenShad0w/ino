<?php 

require_once ('config.php');

$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];

//Переменные для проверки пароля
$number = preg_match('@[0-9]@', $password);
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@',$password);

//Запрос к БД (логин)
$sql_login = "SELECT * FROM `users_log_reg` WHERE login = '$login'";
//Запрос к БД (email)
$sql_email = "SELECT * FROM `users_log_reg` WHERE email = '$email'";
$result = $conn->query($sql_login);

//Проверка пароля
if (strlen($password) < 8) { 
    echo "Пароль должен быть не менее 8 символов!";
    header('Refresh: 3; URL=/dogs_images.php');
} elseif (!$number || !$lowercase || !$uppercase) {
    echo "Пароль должен содержать латинские символы, цифры и хотя бы один символ верхнего и нижнего регистра!";
    header('Refresh: 5; URL=/dogs_images.php');

//Проверка почты
} elseif (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
    echo "Адрес электронной почты указан некорректно.";
    header('Refresh: 3; URL=/dogs_images.php');

//Добавление данных о пользователе в БД
} else 
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
        $edit_id = (int)$_POST['edit_id'];
        $login = mysqli_real_escape_string($conn, $_POST['login']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
    
        // Запрос на обновление данных
        $sql = "UPDATE users_log_reg SET login = '$login', email = '$email', password = '$password' WHERE id = $edit_id";
        
        if (mysqli_query($conn, $sql)) {
            echo "<p>Запись успешно обновлена!</p>";
            header('Refresh: 3; URL=/dogs_images.php');
        } else {
            echo "<p>Ошибка: " . mysqli_error($conn) . "</p>";
        }
    }
?>