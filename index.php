<?php
        session_start();
        //jezeli ktos sie juz zalogowal to tam pozostanie
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stoper</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="styleStopWath.css">
    <link rel="stylesheet" href="style_coockie.css">
    <script src="script.js"></script>
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
                            <a class="list1_2_element" href="kontakt.php">Kontakt</a>

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
                 <h1>Jak działa stoper - chronometraż</h1>
                 <p>Chronometraż to aplikacja służąca do pomiaru czasu pracy wykonywanej
                    czynności, podzielonej na poszczególne kroki. Czas każdego z kroków 
                    można opisać za pomocą pola uwaga. 
                    Tak skonstruowanu układ można zapisać do pliku .xls celem dalszej obróbki.
                 </p>
                 <p>
                    Lista pomiarów służy do opracowania wykresów oraz czasochłonności poszczególnych
                    zadań. Dostarczone w ten sposób dane są niezastąpionym źródłem do analiz
                    czasu dodającego wartość oraz czasu marnotrawioneg na przygotowania. Opisane kroki
                    z największą liczbą powtórzeń można przedstawić za pomocą wykresu Pareto (diagramu Pareto).
                    Diagram przedstawia najwiekszy udział każdego ze zmierzonych zadań. Tak przygotowane
                    dane są podstawą do analizy czynności, które nalezy optymalizować.
                 </p>
                 <p>
                    Najważniejsze zalety chronometrażu to:<br>
                        1. Optymalizacja czasu etapów,<br>
                        2. Optymalizacja czasów przezbrojeń,<br>
                        3. Optymalizacja czasów przygotowań,<br>
                        4. Optymalizacja i pomiar czasów kroków produkcyjnych,<br>
                        5. Redukcja marnotrawstwa,<br>
                        6. Pomiary taktów produkcyjnych,<br>
                        7. Tworzenie wykresów Pareto,<br>
                        8. Tworzenie analiz marsruty produkcyjnej,<br>
                        9. Analiza wąskich gardeł,<br>
                        10. Operacje związane z wycenami oraz estymacjami produkcyjnymi.<br>

                 </p>
            </div>

        </div>
        <footer>
            <script src="coockiePermision.js"></script>
        </footer>
    </section>
    
</body>
</html>
