<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pl">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Instrukcja obsługi stopera — chronometraż krok po kroku</title>
        <meta name="description" content="Praktyczny poradnik korzystania ze stopera: przygotowanie pomiarów, zapisywanie LAP, eksport CSV, przykłady zastosowań i FAQ.">
        <link rel="stylesheet" href="style2.css">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7742530928316810" crossorigin="anonymous"></script>
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
                {
                    "@type": "Question",
                    "name": "Jak rozpocząć pomiar?",
                    "acceptedAnswer": {"@type": "Answer", "text": "Kliknij START, wykonaj czynności, a przy każdym kroku naciśnij LAP, aby zapisać pomiar."}
                },
                {
                    "@type": "Question",
                    "name": "W jakim formacie zapiszę wyniki?",
                    "acceptedAnswer": {"@type": "Answer", "text": "Eksport odbywa się do pliku CSV (średnik jako separator). Excel z polskimi ustawieniami otworzy plik poprawnie."}
                },
                {
                    "@type": "Question",
                    "name": "Czy mogę dodać opis do każdego LAP?",
                    "acceptedAnswer": {"@type": "Answer", "text": "Tak — wpisz opis w polu pod stoperem przed naciśnięciem Enter lub kliknięciem LAP; opis zostanie zapisany razem z wynikiem."}
                }
            ]
        }
        </script>
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
            <?php include 'ad_include.php'; ?>

            <div class="ramka_inputow">

                <h1>Jak korzystać z chronometrażu</h1>
                <img src="images/screen1.png" alt="screen1">

                <h2>Krok 1 — przygotowanie pomiaru</h2>
                <p>Przed rozpoczęciem ustal zakres pomiarów (co mierzysz, ile powtórzeń). Przygotuj miejsce pracy i słownik czynności — spójne nazewnictwo ułatwi analizę wyników.</p>

                <h2>Krok 2 — uruchomienie stopera</h2>
                <p>Kliknij <strong>START</strong>. Stoper zacznie odliczać od zera. Możesz również użyć klawisza Enter w polu opisu, aby dodać pierwszy LAP wygodnie z klawiatury.</p>

                <h2>Krok 3 — rejestracja LAP</h2>
                <p>Przy każdym zakończonym kroku naciśnij <strong>LAP</strong> (lub Enter w polu opisu). Wiersz z pomiarem i kolumną na opis pojawi się w tabeli — wpisany opis zostanie powiązany z danym LAP.</p>

                <h2>Krok 4 — zakończenie i eksport</h2>
                <p>Po zakończeniu kliknij <strong>STOP</strong>, a następnie <strong>Pobierz dane</strong>. Plik zostanie pobrany jako <strong>CSV</strong> (średnik jako separator). Excel w polskiej konfiguracji otworzy go poprawnie i rozdzieli kolumny.</p>

                <h2>Praktyczne wskazówki</h2>
                <ul>
                    <li>W opisach unikaj niepotrzebnych znaków nowej linii — aplikacja usuwa je przy eksporcie.</li>
                    <li>Jeśli eksportujesz bardzo dużo wierszy (>1 mln), rozważ eksport do `.xlsx` lub podział plików.</li>
                    <li>Używaj stałego formatu opisów (np. KROK_A, KROK_B), ułatwi to późniejsze filtrowanie i grupowanie.</li>
                    <li>Przetestuj eksport na swoich maszynach (różne ustawienia Excel) — w razie potrzeby możesz wybrać format hh:mm:ss,mmm.</li>
                </ul>

                <h2>Przykładowe scenariusze (case study)</h2>
                <h3>Case 1 — pomiar montażu</h3>
                <p>Zmierz 10 powtórzeń operacji montażowej. Dla każdego powtórzenia zapisz kroki: przygotowanie, montaż, kontrola. Po eksporcie oblicz średnie czasy poszczególnych kroków.</p>
                <h3>Case 2 — test ergonomii</h3>
                <p>Rejestruj każdy podzadanie w procesie i zapisuj krótkie notatki przy LAP (np. "przerwa", "błąd"). Analiza opisów razem z czasami pomoże znaleźć przyczyny wydłużeń.</p>

                <h2>FAQ</h2>
                <div class="faq">
                    <h4>Jak otworzyć CSV w Excelu?</h4>
                    <p>W polskim Excelu zwykle wystarczy dwuklik. Jeśli kolumny są niepoprawnie rozdzielone, użyj <em>Importuj z tekstu/CSV</em> i ustaw separator na średnik (;).</p>
                    <h4>Czy mogę edytować opis po zapisaniu LAP?</h4>
                    <p>Tak — pola w tabeli są edytowalne (ostatnia kolumna), możesz poprawić opis przed eksportem.</p>
                    <h4>Jak zapisać czasy w formacie hh:mm:ss?</h4>
                    <p>Obecnie eksportuje się wartości liczbowe (sekundy z milisekundami). Jeśli wolisz format godzinowy, mogę dodać opcję eksportu jako hh:mm:ss,mmm.</p>
                </div>

                 
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