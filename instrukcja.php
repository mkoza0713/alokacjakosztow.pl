<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instrukcja</title>
    <link rel="stylesheet" href="style2.css">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7742530928316810"
     crossorigin="anonymous"></script>
</head>
<body>
    <section>
        <nav>
            <ul class="list0">
                <li class="list1">
                    Menu
                    <ul class="list1_2">
                            <a class="list1_2_element" href=logowanie.php><?php
                            if(isset($_SESSION['status_logowania']) && $_SESSION['status_logowania']==true){
                                echo "Panel użytkownika";
                            }else{
                                echo "Logowanie";
                            }                
                            ?> </a>
                            <a class="list1_2_element" href="index.php">Chronometraż</a>
                            <a class="list1_2_element" href="politykaPrywatnosci.php">Polityka prywatności</a>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="centrumStrony">

            <div class="ramka_inputow">

                <h1>Jak korzystać z chronometrażu.</h1>
                <img src="images/screen1.png" alt="screen1">
                <h4>Krok 1</h4>
                <p>Uruchamiamy stoper przyciskiem "START".</p>
                <p>Zegar rozpocznie odliczanie czasu od momentu wciśnięcia przycisku. W tym momencie 
                    czas mierzony jest rejestrowany.
                </p>
                <h4>Krok 2</h4>
                <p>Wykonujemy pomiar kroku mierzonego przyciskiem "LAP".</p>
                <p>Po wciśnięciu przycisku, na ekranie pojawia się wynik pomiaru czasu wraz z miejscem
                    na wpisanie uwagi.
                </p>
                <h4>Krok 3</h4>
                <p>Pomiary badanych kroków wykonujemy do momentu uzyskania maksymalnych zamierzonych efektów,
                    czyli uzyskania wszystkich potrzebnych wyników.
                </p>
                <h4>Krok 4</h4>
                <p>Zapis danych na dysku urządzenia.</p>
                <p>Pracę stopera zakańczamy przyciskiem "STOP" a nastepnie zapisujemy dane na nasz dysk klikając
                    "pobierz dane". Nastąpi pobranie pliku .xls z danymi z naszych pomiarów.
                </p>
                <h4>Krok 5</h4>
                <p>Reset stpera</p>
                <p>Wciśnięcie przycisku "RESET" powoduje przeładowanie strony i w efekcie wyczyszczenie strony
                    z naszych pomiarów.
                </p>

                 
            </div>

        </div>
        <footer>
            <a href="#top">
                <button class="stopwatch_button2">Powrót do góry strony</button>
            </a> 
            <a href="index.php">
                <button class="stopwatch_button2">Powrót na stronę główną</button>
            </a> 
            <script src="coockiePermision.js"></script>
        </footer>
    </section>
    
</body>
</html>