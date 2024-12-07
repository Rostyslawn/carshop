<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Original Car Parts</title>
    @vite("resources/scss/index.scss")
</head>
<body>
<div class="grid-lines">
    <div class="grid grid-line-1"></div>
    <div class="grid grid-line-2"></div>
    <div class="grid grid-line-3"></div>
    <div class="grid grid-line-4"></div>
    <div class="grid grid-line-5"></div>
</div>
<div class="header">
    <div class="main-logo"><a href="{{ route("index") }}"><img src="{{ asset('images/art_invest_logo.webp') }}"
                                                               alt="art_invest_logo"></a></div>
    <div class="nav">
        <div class="item"><a href="{{ route("index") }}">GŁÓWNA</a></div>
        <div class="item"><a href="{{ route("about") }}">WSPÓŁPRACA</a></div>
        <div class="item"><a href="{{ route("contact") }}">KONTAKT</a></div>
    </div>
    <div class="ocp">Original car parts</div>
    <div class="logo">
        <div class="up">
            <div class="item vw">
                <img src="{{ asset('images/vw.png') }}" alt="volkswagen">
            </div>
            <div class="item audi">
                <img src="{{ asset('images/audi.png') }}" alt="audi">
            </div>
            <div class="item skoda">
                <img src="{{ asset('images/skoda.png') }}" alt="skoda">
            </div>
        </div>
        <div class="down">
            <div class="item bmw">
                <img src="{{ asset('images/bmw.png') }}" alt="bmw">
            </div>
            <div class="item mini">
                <img src="{{ asset('images/bmw-mini.png') }}" alt="mini-cooper">
            </div>
            <div class="item mercedes">
                <img src="{{ asset('images/mercedes.png') }}" alt="mercedes">
            </div>
            <div class="item smart">
                <img src="{{ asset('images/smart.png') }}" alt="mercedes-smart">
            </div>
        </div>
    </div>
</div>
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
                        <div class="wholesale">Cena hurtowa: {{ $product->wholesale }} EUR</div>
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
<div class="footer">
    <div class="white-line"></div>
    <span>Copyright © 2024 Art Invest</span>
</div>
<div class="errorParent"></div>
</body>
</html>
