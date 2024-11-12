<head>
  <title>Вход</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <script src="/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<form method="post" action="login_tech.php">
<div class="container p-5 my-5 border"> 
    <h1>Вход</h1>

    <label for="username" class="form-label">Логин</label>
    <input type="text" class="form-control" id="login" name="login" required> 

    <label for="password" class="form-label">Пароль</label> 
    <input type="password" class="form-control" id="password" name="password" required>
  <br/>
  <button type="submit" class="btn btn-primary">Войти</button>
</form>
<form method="post" action="register_tech.php">
  <br>
  <label>Нет аккаунта?</label>
  <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
  </br>
</div>
</form>
</body>
