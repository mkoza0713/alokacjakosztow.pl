<?php
        session_start();
        //jezeli ktos sie juz zalogowal to tam pozostanie
        if(isset($_SESSION['status_logowania'])&&
        $_SESSION['status_logowania']==true){
            header('Location:aplikacja.php');
            exit();
        }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="style_coockie.css">
    <link rel="icon" type="image/png" href="favicon.png">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7742530928316810"
     crossorigin="anonymous"></script>
     <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7742530928316810"
     crossorigin="anonymous"></script>
</head>
<body>
    <section>
        <nav>
            
        </nav>
        <div class="centrumStrony">
                <div class="ramka_inputow">
                    <form action="logowanie_be.php" method="post">
                        <div class="elementKontenera">
                        <h3>Zaloguj</h3>
                        </div>
                        <div class="elementKontenera">
                            <input class="c_text_input" type="text" name="user_login" id="login_id" placeholder="login"><br>
                        </div>
                        <div class="elementKontenera">
                            <input class="c_text_input"  type="password" name="user_password" id="pass_id" placeholder="hasło"><br>
                        </div>
                        <div class="elementKontenera">
                            <input class="przycisk1" type="submit" value="Zaloguj się"/><br><br>
                        </div>
                        <div class="elementKontenera">
                            <?php
                            //komunikat o bledzie
                                if(isset($_SESSION['blad'])){
                                    echo $_SESSION['blad'];
                                    unset($_SESSION['blad']);
                                };
                            ?>
                        </div>    
                    </form>     
                    <form action="rejestracja.php" method="post">         
                        <div class="elementKontenera">
                            <a href='rejestracja.php'><input  class="przycisk1"  type="button" value="REJESTRACJA"></a>
                        </div>
                        <div class="elementKontenera">
                            <a href='index.php'><input  class="przycisk1"  type="button" value="POWRÓT"></a>
                        </div>
                    </form>      
                </div>
                
            <?php
            if(isset($_SESSION['udana_rejestracja'])){
                echo $_SESSION['udana_rejestracja'];
            }
            ?>
            <div class="ramka_inputow">
                 <h1>Jak działa alokacja kosztów</h1>
                 <p>
                    Alokacja kosztów jest to aplikajca do rejestracji czasu pracy z podziałem na zadania
                    oraz klientów.
                    Działanie opiera się na logowaniu użytkowników i tworzeniu zadań z rejestradcją czasu rozpoczęcia 
                    zadania. Po utworzeniu zadania, w panelu pojawia się kafelek danego użytkownika. Użytkownik może rozpocząć kilka zadań na raz. Na danym kafelku znajduje się przycisk "zamknij" który zapisuje dane o zakończeniu
                    zadania. Następuje rejestracja parametrów w bazie danych.
                 </p>
                 <p>
                    Podczas rejestrcji wymagane jest podanie organizacji w jakiej będzie zarejestrowany użytkownik.
                    Organizacja to zbiór użytkowników np. organizacja_PLANOWANIE. W danej organizacji użytkownicy
                    widzą się wzajemnie. 
                 </p>
                 <p>
                    Dane zapisane w bazie danych można wyeksportować do pliku .xls celem dalszej analizy.
                 </p>
                 <p>
                    Analiza pozwala na obliczanie czasu poświęconego dla danego klienta i na dane zadanie. Opracowanaie danych jest dowolne.
                    Dane reprezentowane służą do pomocy w podziale klientów oraz zadań, balansowaniu obciążeń itp.
                    Dodatkowo organizacja ma możliwośc rejestrować czas pracy danego pracownika.
                 </p>
            </div>
        </div>

        <footer>
            <script src="coockiePermision.js"></script>
        </footer>
    </section>
    
</body>
</html>