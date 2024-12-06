<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create User</title>
    @vite("resources/scss/createUser.scss")
</head>
<body>
@if(Auth::user()->status)
    <form method="POST" action="{{ route("createUserRequest") }}">
        @csrf
        <input placeholder="Введите логин для пользователы" name="login">
        <input placeholder="Введите пароль" name="password">
        <button type="submit">Создать</button>
    </form>
@endif
</body>
</html>
