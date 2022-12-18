<?php
session_start();
if(!isset($_SESSION['status_logowania'])){
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikacja</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <?php
        echo '<h1>Witaj '.$_SESSION['db_username'].'</h1>';
        echo '<h2>Jesteś zarejestrowany w organizacji: '.$_SESSION['db_organization'].'</h2>';
        ?>
    </nav>
    <div class="centrumStrony">
        <div class="ramka_inputow">
            <div  class="elementKontenera">
                <form action="wylogowanie.php" method="post">
                    <input class="przycisk1" type="submit" value="Wyloguj" name="wyloguj_button">
                </form>
            </div>
            <div  class="elementKontenera">
                <form action="ustawienia_konta.php" method="post">
                    <input class="przycisk1" type="submit" value="Ustawienia" name="wyloguj_button">
                </form>
            </div>
            <div  class="elementKontenera">
                <h3>Lista zadań</h3>
            </div>
            <div  class="elementKontenera">
                <form action="noweZadanie.php" method="post">
                    <input class="przycisk3" type="submit" value="Nowe zadanie" name="nowe_Zadanie_button">
                </form>
            </div>
        </div>
        

    </div>
    <div class="tabelka">
            <table>
                <thead>
                    <tr><th>Zadania</th></tr>
                    <!-- <tr><th>Osoba</th><th>Klient</th><th>Zadanie</th><th>Start</th><th>Uwagi</th></tr>-->
                </thead>
                <tbody>                
                    <?php
                        require_once "connect.php";
                        $organizacja_usera = $_SESSION['db_organization'];
                        $polaczenie1 = @new mysqli($host, $db_user, $db_password, $db_name);
                            if($polaczenie1->connect_error!=0){
                                echo "ERROR: " .$polaczenie1->connect_errno;  //kod bledu na ekranie
                            }else{
                                $zapytanie1 = "SELECT * FROM zgloszenia WHERE status_zadania='otwarte' AND organizacja='$organizacja_usera'";
                                if($wynikZapytania1 = @$polaczenie1->query($zapytanie1)){
                                    while($wiersz_zapytania = $wynikZapytania1->fetch_assoc()){
                                            echo '<tr><td>
                                                <div class="kafelek">
                                                <form action="noweZadanie.php" method="post">
                                                    <button type="submit" class="przycisk4">
                                                    <input type="hidden" value="'.$wiersz_zapytania['id'].'"name="wiadomosc_edycja_wartosci">
                                                        <div class="kafelek_1">
                                                            <div class="kafelek_1_1">
                                                                '.$wiersz_zapytania['uzytkownik'].'
                                                            </div>
                                                            <div class="kafelek_1_2">
                                                                '.$wiersz_zapytania['klient'].'
                                                            </div>
                                                            <div class="kafelek_1_2">
                                                                '.$wiersz_zapytania['zadanie'].'
                                                            </div>
                                                        </div>
                                                    </button>
                                                 </form>
                                                        <div class="kafelek_2">
                                                            <div class="kafelek_2_1">
                                                                '.$wiersz_zapytania['czas_start'].'
                                                            </div>
                                                            <div class="kafelek_2_2">
                                                                <form action="aplikacja_backend.php" method="post">
                                                                <input class="przycisk2" type="submit" value="zamknij" name="zamknij_zadanie">
                                                                <input type="hidden" value="'.$wiersz_zapytania['id'].'"name="wiadomosc">
                                                                </form>
                                                            </div>
                                                        </div>
                                                </div>
                                                
                                        </td></tr>';
                                    }
                                }
                            }
                            $polaczenie1->close();
                    ?>
                </tbody>
            </table>

        </div>
    <footer>

    </footer>

    <div>
    </div>
    <?php

            if(isset($_SESSION['dodanie_do_bazy'])){
                echo $_SESSION['dodanie_do_bazy'];
                unset($_SESSION['dodanie_do_bazy']);
            }
            ?>
    
</body>
</html>