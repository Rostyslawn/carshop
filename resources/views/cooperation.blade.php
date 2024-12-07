<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About - Art Invest Group</title>
    @vite("resources/scss/index.scss")
    @vite("resources/scss/cooperation.scss")
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
</div>
<div class="container">
    <h1>Poznaj nowy standard w sprzedaży części samochodowych!</h1>
    <h3>Jeśli szukasz sprawdzonych części samochodowych, które gwarantują niezawodność i trwałość, to dobrze trafiłeś!
        Jesteśmy firmą z wieloletnim doświadczeniem w branży motoryzacyjnej, a naszym celem jest dostarczanie klientom
        indywidualnym najwyższej jakości produktów w przystępnych cenach</h3>
    <h4>W naszej ofercie znajdziesz:</h4>
    <ul>
        <li>Części do różnych marek i modeli aut – od najpopularniejszych po mniej znane.</li>
        <li>Oryginalne części i sprawdzone zamienniki, które odpowiadają potrzebom Twojego pojazdu.</li>
        <li>Produkty do układu hamulcowego, silnika, zawieszenia, oświetlenia i wielu innych podzespołów.</li>
    </ul>
    <h4>Dlaczego warto wybrać właśnie nas?</h4>
    <ul>
        <li>Jakość, której możesz zaufać – oferujemy części od renomowanych producentów.</li>
        <li>Szybka dostępność – wiemy, jak cenny jest Twój czas, dlatego staramy się, aby każda część była dostępna jak
            najszybciej.
        </li>
        <li>Konsultacje i pomoc w doborze – nie musisz znać się na wszystkim! Nasi specjaliści chętnie doradzą, abyś
            wybrał najlepsze rozwiązanie.
        </li>
        <li>Atrakcyjne ceny – zapewniamy konkurencyjne stawki, dzięki którym Twój portfel nie odczuje naprawy.</li>
    </ul>
    <h5>Dodatkowo, jeśli potrzebujesz pomocy z montażem, zapraszamy do naszego warsztatu samochodowego. Nasz
        doświadczony zespół mechaników zadba o to, by wszystko działało perfekcyjnie.</h5>
    <h4>Więcej niż części samochodowe!
    </h4>
    <h5>W naszej firmie dbamy nie tylko o samochody, ale także o zadowolenie każdego klienta. Jeśli jesteś osobą, która
        szuka rzetelnych rozwiązań – my jesteśmy tutaj dla Ciebie.</h5>
    <h5>Zajrzyj również do innych obszarów naszej działalności:</h5>
    <ul>
        <li>Produkcja mebli na wymiar – zrealizujemy Twoje marzenie o idealnych meblach.</li>
        <li>Import i eksport towarów – łączymy świat, dostarczając to, czego potrzebujesz.</li>
    </ul>
    <h4>Nie czekaj – skontaktuj się z nami już dziś!</h4>
    <h5>Zapewniamy kompleksową obsługę i ofertę, która sprosta Twoim oczekiwaniom.</h5>
</div>
<div class="footer">
    <div class="white-line"></div>
    <span>Copyright © 2024 Art Invest</span>
</div>
</body>
</html>
