<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main page</title>
    @vite("resources/scss/index.scss")
</head>
<body>
@if(Auth::check())
    <div class="auth-success">
        <h1>Добро пожаловать, {{ Auth::user()->login }}!</h1>
        <div class="search">
            <input class="search-input" placeholder="Введите название или айди товара">
        </div>
    </div>
@else
    <div class="non-auth">
        <h1>Вы не авторизованы.</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input class="login" type="text" name="login" placeholder="Логин" required>
            <input class="password" type="password" name="password" placeholder="Пароль" required>
            <button type="submit">Авторизоваться</button>
        </form>
    </div>
@endif
@if(Auth::check() && Auth::user()->status)
    <div class="admin-panel">
        <h2>Админ возможности</h2>
        <a href="{{ route("createUser") }}" class="create-user">Создать покупателя</a>
        <a class="import-excel">Импортировать excel</a>
    </div>
@endif
@if(Auth::check())
    <form class="logout" method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Выйти из аккаунта</button>
    </form>
@endif
@if(session('success'))
    <div class="message success">
        {{ session('success') }}
    </div>
@endif
@if($errors->any())
    <div class="message error">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
@if(session("success") || $errors->any())
    <script>
        setTimeout(() => {
            document.querySelector(".message").remove();
        }, 4000);
    </script>
@endif
<div class="errorParent"></div>
</body>
</html>
