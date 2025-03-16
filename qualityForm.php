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
                <!-- elementy strony -->
                <div class="elementKontenera">
                    <form action="qualityForm_be.php" method="post">
                            <h1>Uruchomienie</h1>
                            <input type="text" name="" id="id_uruchomienie" placeholder="np. ZSK/...">
                            <hr>
                            <h1>Operator</h1>
                            <input type="text" name="" id="id_operator" placeholder="id operatora">
                            <hr>

                            <h1>Pytanie 1</h1>
                            <input type="radio" id="id_option1_1" value="OP1.1" name="question1">
                            <label for="id_option1_1">Opcja 1</label>
                            <input type="radio" id="id_option1_2" value="OP1.2" name="question1">
                            <label for="id_option1_2">Opcja 2</label>
                            <input type="radio" id="id_option1_3" value="OP1.3" name="question1">
                            <label for="id_option1_3">Opcja 3</label>

                            <br><hr><br>

                            <h1>Pytanie 2</h1>
                            <input type="radio" id="id_option2_1" value="OP2.1" name="question2">
                            <label for="id_option2_1">Opcja 1</label>
                            <input type="radio" id="id_option2_2" value="OP2.2" name="question2">
                            <label for="id_option2_2">Opcja 2</label>
                            <input type="radio" id="id_option2_3" value="OP2.3" name="question2">
                            <label for="id_option2_3">Opcja 3</label>
                            <br><hr><br>

                            <h1>Pytanie 3</h1>
                            <input type="radio" id="id_option3_1" value="OP3.1" name="question3">
                            <label for="id_option3_1">Opcja 1</label>
                            <input type="radio" id="id_option3_2" value="OP3.2" name="question3">
                            <label for="id_option3_2">Opcja 2</label>
                            <input type="radio" id="id_option3_3" value="OP3.3" name="question3">
                            <label for="id_option3_3">Opcja 3</label>
                            <br><hr><br>

                            <h1>Pytanie 4</h1>
                            <input type="radio" id="id_option4_1" value="OP4.1" name="question4">
                            <label for="id_option4_1">Opcja 1</label>
                            <input type="radio" id="id_option4_2" value="OP4.2" name="question4">
                            <label for="id_option4_2">Opcja 2</label>
                            <input type="radio" id="id_option4_3" value="OP4.3" name="question4">
                            <label for="id_option4_3">Opcja 3</label>
                            <br><hr><br>

                            <input type="submit" value="Wyślij">
                    </form>


                </div>
        </div>
        <footer>
            <script src="coockiePermision.js"></script>
        </footer>
    </section>
    
</body>
</html>
