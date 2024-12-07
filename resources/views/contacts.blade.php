<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact - Art Invest Group</title>
    @vite("resources/scss/index.scss")
    @vite("resources/scss/contacts.scss")
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
</div>
<div class="container">
    <h1>ART INVEST SP. Z O. O.</h1>
    <h5>NIP: PL5981646499</h5>
    <h5>KRS: 0000825739</h5>
    <h5>REGON: 385389873</h5>
    <h5>EORI: 598164649900000</h5>
    <h5>BDO: 000566013</h5>
</div>
<div class="footer">
    <div class="white-line"></div>
    <span>Copyright © 2024 Art Invest</span>
</div>
</body>
</html>
