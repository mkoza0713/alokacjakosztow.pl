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
                            określonych wydarzeń, działań lub zjawisk. Jest to technika 
                            stosowana w wielu dziedzinach życia, w tym w sporcie, przemyśle, 
                            nauce, nawigacji i wielu innych. Celem chronometrażu jest uzyskanie 
                            dokładnych pomiarów czasu, które mogą być używane do różnych celów, 
                            takich jak monitorowanie wydajności, kontrola jakości, analiza wyników 
                            czy efektywne zarządzanie czasem. Istnieje wiele narzędzi i technologii 
                            wykorzystywanych w chronometrażu, w tym stopery, zegary, systemy monitorowania 
                            czasu, oprogramowanie i wiele innych.
                        </p>
                        <img src="images/screen3.png" alt="screen3">
                        <br><br>

                    <h1>Jak działa stoper - chronometraż?</h1>
                    <p>
                        Stoper to narzędzie służące do pomiaru czasu, a jego działanie zazwyczaj 
                        opiera się na prostych mechanizmach, zarówno w wersjach tradycyjnych 
                        (mechanicznych) jak i cyfrowych. Działa on na zasadzie dokładnego 
                        śledzenia upływu czasu, umożliwiając użytkownikowi rejestrowanie i 
                        kontrolowanie czasu w sposób precyzyjny.
                        Chronometraż to aplikacja służąca do pomiaru czasu pracy wykonywanej
                        czynności, podzielonej na poszczególne kroki. 
                        Poza klasycznym działaniem stopera, chronometraż oferuje dopisanie 
                        uwag do każdego z pomiarów.Taka uwaga jest cennym źródłem informacji dla
                        osoby mierzącej czas.
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
                        dane są podstawą do analizy czynności, które należy optymalizować.
                    </p>
                    <img src="images/screen2.png" alt="screen2">


                    <br><br>
                    <h2>Dlaczego stosować chronometraż?</h2>
                    <p>
                        Pomiar czasu odgrywa kluczową rolę w przemyśle, pomagając w kontrolowaniu procesów 
                        produkcyjnych,zoptymalizacji wydajności i zapewnieniu jakości produktów
                    </p>
                    <p>
                    Najważniejsze zalety chronometrażu to: <br>
                    - Kontrola czasu produkcji,
                    - Zarządzanie procesami,
                    - Kontrola jakości,
                    - Optymalizacja wydajności,
                    - Monitorowanie czasu pracy,
                    - Zarządzanie przerwami,
                    - Testy i kontrole,
                    - Zarządzanie zasobami,
                    - Planowanie konserwacji i przeglądów,
                    - Zarządzanie projektami,
                    </p>        
                    <p>
                    Warto podkreślić, że stoper może być dostosowany do 
                    konkretnych potrzeb przemysłu i branży. Korzystanie 
                    z takich narzędzi pozwala na lepszą kontrolę nad czasem, 
                    optymalizację procesów produkcyjnych oraz poprawę wydajności 
                    i jakości produkcji.
                    </p>   


                    <br><br>
                    <h2>Jeśli sam stoper nie wystarcza, wtedy użyj aplikacji do rejestrowania
                        zadań!
                    </h2>
                    <a href="logowanie.php"><h2>Wypróbuj aplikację do alokowania kosztów!</h2></a>
            </div>

        </div>
        <footer>
            <a href="#top">Powrót do góry strony</a>  
            <script src="coockiePermision.js"></script>
        </footer>
    </section>
    
</body>
</html>
