<?php
session_start();


?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ustawienia_konta</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <div class="nazwa_strony">
            <?php
            echo '<h1>Witaj '.$_SESSION['db_username'].'</h1>';
            ?>
        </div>
    </nav>
        <div class="centrumStrony">
            <div class="ramka_inputow">
                <div  class="elementKontenera">
                    <h3>Zmiana hasła</h3>
                </div>
                <form method="post" action="zmiana_hasla.php">
                    <div  class="elementKontenera">
                        <input type="password" name="aktualne_haslo" id="aktualne_haslo" placeholder="wpisz aktualne hasło"><br>
                    </div>
                    <div  class="elementKontenera">
                        <input type="text" name="nowe_haslo1" id="nowe_haslo_1" placeholder="wpisz nowe hasło"><br>
                    </div>
                    <div  class="elementKontenera">
                        <input type="text" name="nowe_haslo2" id="nowe_haslo_2" placeholder="wpisz ponownie hasło"><br>
                    </div>
                    <div class="elementKontenera">
                        <input class="przycisk1" type="submit" value="Zmien haslo"><br>
                    </div>
                    <?php
                        if(isset($_SESSION['e_pass_change'])){
                            echo $_SESSION['e_pass_change'];
                            unset ($_SESSION['e_pass_change']);
                        }
                    ?>
                </form>
                <div  class="elementKontenera">
                    <h3>Eksport dancyh dla organizacji</h3>
                </div>
                <form action="eksport_danych_csv.php" method="post">
                    <div  class="elementKontenera">
                        <input class="przycisk1" type="submit" value="Eksport CSV"><br>
                    </div>
                </form>
                <div  class="elementKontenera">
                    <h3>Słowniki</h3>
                </div>
                <form action="dodanieKlienta.php" method="post">
                    <div  class="elementKontenera">
                        <input class="przycisk1" type="submit" value="Słownik klientów"><br>
                    </div>
                </form>
                <form action="dodanieZadania.php" method="post">
                    <div  class="elementKontenera">
                        <input class="przycisk1" type="submit" value="Słownik zadań"><br>
                    </div>
                </form>
                <br><br>
                    <div class="elementKontenera">
                        <a href=index.php><input class="przycisk1" type="button" value="POWRÓT"></a><br>
                    </div>



            </div>
        </div>
    
    
</body>
</html>