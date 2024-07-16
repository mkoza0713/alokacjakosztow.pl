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
    <meta name="keywords" content="stoper, chronometraż, chronometr, alokacja kosztów, 
    alokowanie, mini-cms, stoper z zapisem, chronometer, plik, chronometr z plikiem, stoper z zapisem do pliku xls,
    stoper z zapisem do pliku download, stoper download, stoper z zapisem do pliku, stoper z plikiem, licznik godzin, 
    wynik stopera do pliku, rejestracja czasu pracy, rejestracja pracy, zliczanie casu pracy, controlling, logowanie pracowników, 
    aplikacja do śledzenia czasu pracy, ewidencja czasu pracy, ewidencja godzin">
    <meta name="author" content="Mateusz Koza">
    <title>Stoper</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="styleStopWath.css">
    <link rel="stylesheet" href="style_coockie.css">
    <link rel="icon" type="image/png" href="favicon.png">
    <script src="script.js"></script>
    <script src="qr_reader.js"></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js></script>
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
            <form action="qualityForm_be.php" method="post">
                <!-- elementy strony -->
                <div class="elementKontenera">
                    <label for="barcode_id">Zlecenie: </label>
                    <div class="elementKontenera_2">
                        <input class="c_text_input" type="text" id="barcode_id" name="barcode" readonly>
                        <div id="scanner-container" class="scanner_container_class">   
                    </div>
                </div>
                <div class="elementKontenera">
                        <label for="pn_id_id">ID wyrobu: </label>
                        <input class="c_text_input" type="text" name="pn_id" id="pn_id_id">
                </div>
                <div class="elementKontenera">
                        <label for="zdjecie_1">Zdjęcie lutowania J4</label>
                        <input class="c_file_input" type="file" name="photo_1" id="photo_1_id">
                </div>
            </form>
            <div class="elementKontenera">
                <a href=logowanie.php><input class="przycisk1" type="button" value="POWRÓT"></a><br>
            </div>
            <div class="elementKontenera">
                <!-- <iframe src="https://alokacjakosztow.pl" style="border:none;" frameborder="0"></iframe> -->
            </div>
        </div>
        <footer>
            <script src="coockiePermision.js"></script>
        </footer>
    </section>
    
</body>
</html>
