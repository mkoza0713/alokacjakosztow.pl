<?php
session_start();
if(!isset($_SESSION['status_logowania'])){
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slownik zadan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <nav>

        </nav>
        <div class="centrumStrony">
            <div class="ramka_inputow">
                <div class="elementKontenera">
                    <h3>Dodaj zadanie</h3>
                </div>
                <form action="dodanieZadaniaBackend.php" method="post">
                    <div class="elementKontenera">
                        <input  class="przycisk1" type="submit" value="dodaj">
                    </div>
                    <div class="elementKontenera">
                        <input type="text" name="nowe_zadanie" id="nowe_zadanie_id">
                    </div>
                </form>
                <div class="elementKontenera">   
                        <tbody>                        
                            <?php
                            require_once "connect.php";
                            $organizacja_usera = $_SESSION['db_organization'];
                            $polaczenie1 = @new mysqli($host, $db_user, $db_password, $db_name);
                                if($polaczenie1->connect_error!=0){
                                    echo "ERROR: " .$polaczenie1->connect_errno;  //kod bledu na ekranie
                                }else{
                                    $zapytanie1 = "SELECT * FROM zadania WHERE organizacja='$organizacja_usera'";
                                    if($wynikZapytania1 = @$polaczenie1->query($zapytanie1)){
                                        while($wiersz_zapytania = $wynikZapytania1->fetch_assoc()){
                                            echo '<tr><td>
                                            <div class="kafelek_lista_1">
                                                <div>
                                                        '.$wiersz_zapytania['zadanie'].'
                                                </div>
                                                <div>
                                                        <form action="dodanieZadaniaBackend.php" method="post">
                                                        <input class="przycisk5" type="submit" value="usun" name="usun_zadanie">
                                                        <input type="hidden" value="'.$wiersz_zapytania['id'].'"name="wiadomosc">
                                                        </form>
                                                </div>
                                            </div>
                                        </td></tr>';
                                        }
                                    }
                                }
                                $polaczenie1->close();
                        ?>
                        </tbody>    
                </div>
                <br><br>
                <div class="elementKontenera">
                    <a href=ustawienia_konta.php><input class="przycisk1" type="button" value="POWRÓT"></a><br>
                </div>

            </div>
        </div>
        <footer>
            
        </footer>
    </section>
    
</body>
</html>