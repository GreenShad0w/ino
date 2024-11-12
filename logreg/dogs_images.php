<link href="/css/bootstrap.min.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<div class="container p-5 my-5 border">
<?php

require_once ('config.php');

if(isset($_GET['formsubmit'])) echo "<script>alert('Форма отправлена!');</script>";

// SQL-запрос для выборки данных
$sql = "SELECT * FROM users_log_reg";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Управление записями</title>
</head>
<body>
    <h1>Список пользователей</h1>

    <!-- Форма для добавления новой записи -->
    <form method="post"  action="add_in_table.php">
        <label for="login">Логин</label>
        <input type="text" class="form-control" id="login" name="login" required>
        <br>
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
        <br>
        <label for="password">Пароль</label>
        <input type="text" class="form-control" id="password" name="password" required>
        <br>
        <button type="submit" class="btn btn-primary" name="add">Добавить</button>
        <br><br>
    </form>

    <?php
    // Подключение к базе данных
    require_once ('config.php');

    // Обработка отправленной формы
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
        $login = mysqli_real_escape_string($conn, $_POST['login']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // Запрос на добавление данных
        $sql = "INSERT INTO users_log_reg (login, email, password) VALUES ('$login', '$email', '$password')";
        if (mysqli_query($conn, $sql)) {
            echo "<p>Новая запись успешно добавлена!</p>";
            header('Refresh: 3; URL=/dogs_images.php');
        } else {
            echo "<p>Ошибка: " . mysqli_error($conn) . "</p>";
        }
    }

    // Обработка удаления записи
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
        $id = (int)$_POST['delete_id'];
        
        $sql = "DELETE FROM users_log_reg WHERE id = $id";
        if (mysqli_query($conn, $sql)) {
            echo "<p>Запись успешно удалена!</p>";
            header('Refresh: 3; URL=/dogs_images.php');
        } else {
            echo "<p>Ошибка при удалении: " . mysqli_error($conn) . "</p>";
        }
    }

    if (isset($_POST['edit_id'])) {
        $edit_id = (int)$_POST['edit_id'];
        
        // Запрос на выборку данных для редактирования
        $sql = "SELECT * FROM users_log_reg WHERE id = $edit_id";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        }
    }

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

    <!-- Форма для редактирования записи -->
    <?php if (isset($row)): ?>
    <h2>Редактировать запись</h2>
    <form method="post" action="edit_in_table.php">
        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
        
        <label for="login">Логин</label>
        <input type="text" class="form-control" id="login" name="login" value="<?php echo $row['login']; ?>" required>
        <br>

        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
        <br>

        <label for="password">Пароль</label>
        <input type="text" class="form-control" id="password" name="password" value="<?php echo $row['password']; ?>" required>
        <br>

        <button type="submit" class="btn btn-primary" name="update">Обновить</button>
        <br><br>
    </form>
    <?php endif; ?>
    
    <?php
    // Вывод таблицы с данными
    $sql = "SELECT * FROM users_log_reg";
    $result = mysqli_query($conn, $sql);
    ?>

    <!-- Таблица с данными -->
    <table border="1" class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Логин</th>
            <th>Email</th>
            <th>Действия</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['login'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>";
                echo "<form method='post' action='' style='display:inline;'>";
                echo "<input type='hidden' name='delete_id' value='" . $row['id'] . "'>";
                echo "<button type='submit' class='btn btn-primary' >Удалить</button>";
                echo "</form>";
                echo "<br>";
                echo "&nbsp;";
                echo "<form method='post' action=''>";
                echo "<input type='hidden' name='edit_id' value='" . $row['id'] . "'>";
                echo "<button type='submit' class='btn btn-primary' >Редактировать</button>";
                echo "</form>"; 
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Нет данных</td></tr>";
        }
        ?>
    </table>

    <?php
    // Закрытие подключения к базе данных
    mysqli_close($conn);
    ?>
</div>
</body>
</html>