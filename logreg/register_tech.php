<?php 

session_start();

?>
<head>
  <title>Регистрация</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <script src="/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<form method="post" action="register.php">
<div class="container p-5 my-5 border"> 
    <h1>Регистрация</h1>
    <label for="login" class="form-label">Логин</label>
    <input type="text" class="form-control" id="login" name="login" placeholder="Nikita969"
    required> 
    

    <label for="password" class="form-label">Пароль</label> 
    <input type="password" class="form-control" id="password" name="password" placeholder="Пароль должен быть не менее 8 символов"
    required>
    

    <label for="password" class="form-label">Подтверждение пароля</label> 
    <input type="password" class="form-control" id="rep_password" name="rep_password" placeholder="Повторите пароль"
    required>

    <label for="email" class="form-label">Адрес электронной почты</label> 
    <input type="text" class="form-control" id="email" name="email" placeholder="Введите адрес электронной почты"
    required>

  <br/>
  <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
</form>
<form method="post" action="index.php">
  <br>
  <label>Уже есть аккаунт?</label>
  <button type="submit" class="btn btn-primary">Войти</button>
  </br>
</div>
</form>
</body>
