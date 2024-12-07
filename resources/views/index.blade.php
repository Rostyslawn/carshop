<!doctype html>
<html lang="pl">
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
        <h1>Witamy, {{ Auth::user()->login }}!</h1>
        <form method="GET" action="{{ route('search') }}">
            <div class="search">
                <input name="product_id" class="search-input" placeholder="Wprowadź numer pozycji">
                <button type="submit">Szukać</button>
            </div>
        </form>
    </div>
    @if(session("products"))
        <div class="products">
            @foreach(session("products") as $product)
                <div class="product">
                    <form method="POST" action="{{ route("buy") }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                        <input type="hidden" name="user" value="{{ Auth::user()->login }}">
                        {{ $product->name }}
                        <div class="price">Cena: {{ $product->price }} EUR</div>
                        <button type="submit">Kup</button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
@else
    <div class="non-auth">
        <h1>Użytkownik nie jest autoryzowany.</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input class="login" type="text" name="login" placeholder="Login" required>
            <input class="password" type="password" name="password" placeholder="Hasło" required>
            <button type="submit">Zaloguj się</button>
        </form>
    </div>
@endif
@if(Auth::check() && Auth::user()->status)
    <div class="admin-panel">
        <h2>Panel administratora</h2>
        <a href="{{ route("createUser") }}" class="create-user">Utwórz klienta</a>
        <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="file">Import z excel:</label>
            <input type="file" name="file" accept=".xlsx,.xls,.csv" required>
            <button type="submit">Import</button>
        </form>
        <a href="{{ route('cart') }}">Zamówienia</a>
    </div>
@endif
@if(Auth::check())
    <form class="logout" method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Wylogować się z konta</button>
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
