<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    @vite('resources/scss/cart.scss')
</head>
<body>
@if(Auth::check() && Auth::user()->status)
    <h1>Zamówienia</h1>
    <div class="products">
        @foreach($products as $product)
            <div class="product">
                <form method="POST" action="{{ route("delete") }}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                    <input type="hidden" name="user" value="{{ $product->user }}">
                    <div class="name">ID pozycji: {{ $product->product_id }}</div>
                    <div class="user">Użytkownik: {{ $product->user }}</div>
                    <button type="submit">Usuń</button>
                </form>
            </div>
        @endforeach
    </div>
@endif
</body>
</html>
