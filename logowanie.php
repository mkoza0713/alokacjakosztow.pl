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
                 <h1>Co to jest alokacja kosztów?</h1>
                 <p>
                 Alokacja kosztów to proces przypisywania kosztów lub wydatków do konkretnych działów, 
                 produktów, projektów lub innych jednostek organizacyjnych w celu monitorowania i zarządzania nimi. 
                 Jest to ważny element rachunkowości zarządczej i rachunkowości kosztów, który pomaga przedsiębiorstwom 
                 śledzić, jakie koszty są związane z różnymi obszarami działalności i jakie produkty lub usługi generują 
                 te koszty.
                 </p>
                 <img src="images/screen4.png" alt="screen4.png">
                 <p>Alokacja kosztów może obejmować różne metody i techniki, w zależności od potrzeb i charakterystyki przedsiębiorstwa. 
                    Przykładem takiej metody jest pomiar czasu poświeconego dla danego klienta, wraz z zadaniami jakie były wykonywane np.
                    wycena, przygotowanie dokumentów, przygotowanie wysyłki itd. 
                </p>
                <p>
                Alokacja kosztów ma na celu umożliwienie przedsiębiorstwom dokładnego monitorowania kosztów, ocenę rentowności różnych 
                projektów lub produktów, podejmowanie decyzji zarządczych i określanie cen produktów. Jest to również istotne narzędzie w 
                procesie budżetowania i oceny wydajności firmy. Warto zaznaczyć, że dokładność alokacji kosztów jest kluczowa dla podejmowania 
                mądrych decyzji zarządczych.
                </p>

                 <h2>Po co rejestracja czasu pracy?</h2>
                 <p>
                 Rejestracja czasu pracy to proces dokumentowania i śledzenia czasu, który pracownicy spędzają na wykonywaniu swoich 
                 obowiązków w ramach zatrudnienia. Jest to ważne narzędzie zarządzania zasobami ludzkimi i kontrolowania czasu pracy pracowników. 
                 Rejestracja czasu pracy może być wykorzystywana w różnych celach, w tym do naliczania płac, monitorowania wydajności, 
                 zarządzania projektami, planowania zasobów, a także w celu spełnienia wymagań prawnych związanych z regulacjami dotyczącymi 
                 czasu pracy.
                 </p>
                 <img src="images/screen5.png" alt="screen5.png">

                 <h2>Śledzenie czasu pracy oraz nadzór nad pracownikami, zapewnia aplikacja alokacjakosztow.pl</h2>
                 <p>Jest to aplickacja przeglądarkowa, stworzona właśnie po to aby w bardzo prosty sposób zarządzać działem lub zasobami
                    ludzkimi. Największym plusem jest fakt, że jest dostępna z każdego miejsca na ziemi, gdzie mamy dostęp do internetu.
                 </p>
                 <h4>Jedyną czynnością jaką należy wykonać jest zarejestrowanie się poprzez <a href="rejestracja.php">formularz</a>.</h3>
                 <p>Podczas rejestracji należy podać oragnizację w jakiej będą jej członkowie. Wszystkie osoby w danej organizacji widzą 
                    się wzajemnie!
                 </p>
                 <img src="images/screen6.png" alt="screen6.png">
                 <h2>Obsługa jest prosta i intuicyjna!</h2>
                 <p>Sam panel składa się tak na prawdę z zadań, które rozpoczęli pracownicy - każde z nich jest oddzielnym kafelkeim
                na którym są dane o zadaniu jakie wykonuje.
                 </p>
                 <img src="images/screen7.png" alt="screen7.png">
                 <h4>Ale po kolei...</h4>
                 <p>Po zarejestrowaniu musimy stworzyć słowniki zadań oraz klientów jakie mogą obsługiwać pracownicy. Listy te są w zakładce
                    MENU->USTAWIENIA. Słowniki są tworzone jednorozowo dla wszystkich w oraganizacji, nie ma potrzeby tworzyć każdy słownik z 
                    osobna!
                 </p>
                 <p>
                    Po utworzeniu słowników można rozpocząć pierwsze zadanie!
                 </p>
                 <img src="images/screen8.png" alt="screen8.png"><br>
                 <img src="images/screen9.png" alt="screen9.png">
                 
                 <h4>To wszystko.</h4>
                 <p>
                    Dane wprowadzone są już w bazie danych, do której masz dostęp poprzez zakłdadkę MENU->USTAWIENIA->EKSPORT.
                    Dane można dowolnie obrabiać, generując podsumowanie okresowej pracy oraz kontrolę czasu pracy. 
                 </p>
                 <h2>Podsumowując</h2>
                 <P>Dane sa przejrzyste i nie zawierają niepotrzebnych rzeczy oraz są bardzo dokładne!
                        Jest to jedna z niewielu darmowych aplikacji oferujących takie możliwości. Rejestrując się oraz korzystając z alokacjakosztow.pl otrzymujemy:<br>
                        1. Prosty system mini-CMS,<br>
                        2. Prosty system rejestracji czasu pracy,<br>
                        3. Możliwość szybkiego podsumowania projektu/klienta/zadań,<br>
                        4. Możliwość elastycznego zarządzania zespołem poprzez przydzielanie odpowiednije liczby osoób do projektów,<br>
                        5. Szybki dostęp do danych,<br>
                 </P>

            </div>
        </div>

        <footer>
            <a href="#top">
                <button class="stopwatch_button2">Powrót do góry strony</button>
            </a>  
            <script src="coockiePermision.js"></script>
        </footer>
    </section>
    
</body>
</html>