<?php
        session_start();
        //jezeli ktos sie juz zalogowal to tam pozostanie
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="stoper - chronometraż z zapisem do pliku oraz mini cms do alokowania kosztów">
    <meta name="keywords" content="stoper, chronometraż, chronometr, alokacja kosztów, alokowanie, mini-cms, stoper z zapisem">
    <meta name="author" content="Mateusz Koza">
    <title>Stoper</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="styleStopWath.css">
    <link rel="stylesheet" href="style_coockie.css">
    <link rel="icon" type="image/png" href="favicon.png">
    <script src="script.js"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7742530928316810"
     crossorigin="anonymous"></script>
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
                            <a class="list1_2_element" href="politykaPrywatnosci.php">Polityka prywatności</a>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="centrumStrony">
            <div class="ramka_inputow">
                <div  class="stopwath_out">
                    <div id="stopwath_out">00:00:00</div>
                    <div style = "font-size: 30px; width: 20px" id="stopwath_out2">.000</div>
                </div>
            </div>
            <div class="ramka_inputow">
                <button class="stopwatch_button1" id="start_button_stopwatch" onclick=start_lap_f()>START</button>
                <button class="stopwatch_button1" id="stop_button_stopwatch" onclick=stop_lap_f()>STOP</button>
            </div>
            <form action="download_stopwatch.php" method="post" target="_blank">
                <div class="lap_list">
                    <table id="table_id" class="table_class">
                        <!-- tu jest generowana tabelka w js -->
                    </table>

                </div>
                <div class="table_footer">
                    <input type="text" name="stopWatch_last_name" id="stopWatch_lastId" value="0" hidden>
                        <button class="stopwatch_button2" type="submit">pobierz dane</button>
                    <!-- <button class="stopwatch_button2" id="exp_button_stopwatch" onclick=export_lap_f()>eksport danych</button> -->
                </div>
            </form>

            <div class="ramka_inputow">
                
                <a href="instrukcja.php"><h1>Czym jest chronometraż?</h1></a>
                        <p>Chronometraż to proces pomiaru i rejestracji czasu trwania 
                            określonych czynności, działań lub wydarzeń. Jest to technika 
                            o bardzo szerokim spektrum zastosowania takim jak sport, przemysł, 
                            nauka, nawigacja i wiele innych. Głównym celem stosowania chronometrażu jest uzyskanie 
                            dokładnych pomiarów czasu, które mogą być używane do wielu celów, 
                            takich jak: kontrola/monitorowanie wydajności, kontrolowanie jakości, analiza wyników 
                            czy efektywności zarządzania czasem. Istnieje wiele narzędzi i technologii 
                            wykorzystywanych w chronometrażu, w tym stopery, zegary, systemy monitorowania 
                            czasu, oprogramowanie i wiele innych. 
                            Istotnym jest wychwytywanie dużej ilości szczegółów podczas przeprowadzanych badań. Większa liczba
                            danych pozwala szerzej popatrzeć na problem.
                        </p>
                        <img src="images/screen3.png" alt="screen3">
                        <br><br>

                    <h1>Jak działa stoper - chronometraż?</h1>
                    <p>
                        Stoper to narzędzie służące do pomiaru czasu, a zasada działania opiera się niezależnie od rodzaju stopera,
                        od rozpoczęcia pomiaru. Następuje albo uruchomienie zegara - tak przy wersjach tradycyjnych jak i cyfrowych,
                        lub zapisaniu czasu rozpoczęcia pomiaru w przypadku aplikacji korzystających z zegara czasu rzeczywistego.
                        Wraz z upływem czasu następuje jego rejestracja a użytkownik wpływa na to kiedy ma być przerwa w pomiarze.
                        Prezentowana aplikacja służy właśnie do takiego pomiaru. Dodatkowo użytkownik ma możliwość rejestracji notatek
                        przy każdym z okrążeń stopera - LAP. Taka uwaga jest bardzo cenna gdy zbieramy dużo danych w krótkim czasie
                        a gdzie każdy krok należy szczegółowo opisać. Taka metoda pozwala zaoszczędzić czas oraz usprawnić jego rejestrację.
                        Tak zebrane dane to nieocenione źródło informacji podczas dalszych analiz, gdzie liczy się zarówno jakość danych 
                        jak i dokładny opis wydarzeń rejestrowanych.
                    </p>
                    <img src="images/screen1.png" alt="screen1">
                    <p>
                        Na rysunku przedstawiono zrzut ekranu z wykorzystaniem chronometrażu. Każdy z wyżej 
                                wymienionych wyników pojawi się w wyeksportowanej analizie z pomiarami czasu.
                    </p>
                    <br><br>

                    
                    <h2>Jak można wykorzystać wyniki pomiarów?</h2>
                    <p>
                        Lista pomiarów służy do opracowania wykresów oraz czasochłonności poszczególnych
                        zadań. Dostarczone w ten sposób dane są niezastąpionym źródłem do analiz
                        czasu dodającego wartość oraz czasu marnotrawionego na przygotowania. Opisane kroki
                        z największą liczbą powtórzeń można przedstawić za pomocą wykresu Pareto (diagramu Pareto).
                        Diagram przedstawia największy udział każdego ze zmierzonych zadań. Tak przygotowane
                        dane są podstawą do analizy czynności, które należy optymalizować. Metodologia lean wykorzystuje takie dane
                        do analiz pracochłonności kroków oraz eliminacji wąskich gardeł. Takie podejście pozwala elastycznie
                        balansować liniami produkcyjnymi
                    </p>
                    <img src="images/screen2.png" alt="screen2">


                    <br><br>
                    <h2>Dlaczego stosować chronometraż?</h2>
                    <p>
                        Pomiar czasu odgrywa kluczową rolę w przemyśle, zakładach produkcyjnych, pomagając w kontrolowaniu procesów,
                        zadań, projektów oraz w optymalizacji działań i prac wykonywanych przez dane komórki. Ma to swoje odzwierciedlenie
                        w jakości, ponieważ dążenie do optymalizacji wprowadza dobre nawyki oraz motywuje do wprowadzenia coraz to nowszych
                        usprawnień.
                    </p>
                    <p>
                        Coraz częściej pojawiającym się sygnałem do wprowadzania narzędzi rejestracji procesów jest rozwijająca się konkurencja.
                        Każde, nawet najmniejsze posunięcie ku optymalizacjom pozwala oszczędzać pieniądze. A pieniądze to napędzanie rozwoju firmy.
                        Takie działania jak i szereg innych wprowadza harmonię oraz ład. Miejsca gdzie panuje porządek są łatwiejsze w obsłudze. 
                        Niepotrzebne rzeczy trafiają albo do magazynu albo do kosza. Wprowadzając w organizacji taką metodologię, buduje się dobre 
                        nawyki. Automatyzacja przemysłu to proces opierający się na wyłapywaniu powtarzalnych procesów i zastępowaniu ich jednym lub też
                        automatem. Jest wyzwaniem wprowadzenie automatyzacji bez dokładnych pomiarów procesów jakie zachodzą w danej komórce. Mapowanie procesu
                        ukazuje wszystkie słabe i mocne punkty, pozwala na działanie w konkretnych miejscach gdzie jest to potrzebne.
                    </p>
                    <h2>Jak poprawnie interpretować wyniki pomiarów?</h2>
                    <p>Proces pomiaru składa się tak na prawdę z kilku kroków. Pierwsze z nich zawierają pracę w miejscu gdzie chcemy prowadzić badanie.
                    Każde kolejne to już konkretne kroki lub środki wprowadzane już po pomiarach. Tak więc mamy: <br>
                    1. Przygotowanie pomiarów - zwykle jest to wybranie miejsca działania oraz przygotowanie słownika operacji. Należy pamiętać
                    o pozytywnym nastawieniu! <br>
                    2. Przeprowadzenie pomiarów - powinno się zaczynać od początku trwania procesu. To bardzo ważne ponieważ tam już zaczynają
                    się problemy oraz mogą wyłonić się konkretne działania.<br>
                    3. Opracowanie wyników - jest to kluczowy moment gdzie mamy masę danych do obrobienia. Grupowanie wydarzeń oraz wszelkich wystąpień
                    należy uzależnić od możliwości i potrzeb danego procesu. Pozytywny objaw to duża liczba grup z podziałem na probemy. 
                    Bardzo dobrym jest jak największa liczba wystąpień danego problemu. Obrazuje to bardzo jasno kierunek dalszych działań. <br>
                    4. Wylistowanie problemów - taka lista powinna zawierać liczbę wystąpień. Pozwoli to na odpowiednie zakolejkowanie planu działania. 
                    Odpowiednie zakolejkowanie zadań gwarantuje w bardzo krótkim czasie osiągnąć bardzo dużo pozytywnych wyników a to przekłada się na czysty zysk!
                    <br>
                    5. Rozwiązywanie grupy problemów - i tak w zależności co jest do wykonania jest albo cedowane na inne komórki albo wykonywane przy
                    współpracy z daną komórką. <br>
                    6. Ponowna analiza problemu - i tak wracamy do punktu pierwszego. Pozwoli to na dokładne zmierzenie efektów naszej pracy. Bardzo
                    ważne jest chwalenie się wynikami w postaci publikacji wykresów, punktów itd.
                    </p>
                    <p>
                        Jeżeli sama analiza potrzebna jest do normowania pracy, ważna jest systematyka w pomiarach oraz zmienne warunki na stanowisku.
                        Musi to być odwzorowanie procesu i jego problemów. Im większa liczba liczba wystąpień tym mniejsze ryzyku na popełnienie błędu.
                        Mniejsze ryzyku to mniejsza niedokładność pomiarowa.   
                    </p>
                    <p>
                    Najważniejsze zalety chronometrażu to: <br>
                    - Kontrola czasu produkcji,<br>
                    - Zarządzanie procesami,<br>
                    - Kontrola jakości,<br>
                    - Optymalizacja wydajności,<br>
                    - Monitorowanie czasu pracy,<br>
                    - Zarządzanie przerwami,<br>
                    - Testy i kontrole,<br>
                    - Zarządzanie zasobami,<br>
                    - Planowanie konserwacji i przeglądów,<br>
                    - Zarządzanie projektami,<br>
                    </p>        


                    <br><br>
                    <h2>Dokładna instrukcja korzystania z chronometrażu znajduje się pod adresem <a href="instrukcja.php">alokacjakosztow.pl/instrukcja</a></h2>
                    <h2>Natomiast jeśli sam stoper to za mało, pod linkiem znajduje się aplikacja do rejestracji czasu pracy!
                        Znajdziesz ją w zakładce <a href="logowanie.php">logowanie</a> lub pod adresem: <a href="logowanie.php">alokacjakosztow.pl/logowanie</a>
                    </h2>
            </div>

        </div>
        <footer>
            <a href="#top">Powrót do góry strony</a>  
            <script src="coockiePermision.js"></script>
        </footer>
    </section>
    
</body>
</html>
