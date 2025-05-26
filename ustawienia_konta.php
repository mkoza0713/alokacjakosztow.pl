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
    <link rel="stylesheet" href="style2.css">
    <link rel="icon" type="image/png" href="favicon.png">
</head>
<body>
    <nav>
        <div class = "nav_element">
            <?php
                echo '<h3>Witaj '.$_SESSION['db_username'].'</h3>';
                echo '<h3>Organizacja: '.$_SESSION['db_organization'].'</h3>';
            ?>
        </div>
        <ul class="list0">
            <li class="list1">
                Menu
                <ul class="list1_2">    
                        <a class="list1_2_element" href="wylogowanie.php">Wyloguj</a>
                        <a class="list1_2_element" href="index.php">Chronometraż</a>
                        <a class="list1_2_element" href="ustawienia_konta.php">Ustawienia</a>
                        <a class="list1_2_element" href="politykaPrywatnosci.php">Polityka prywatności</a>

                </ul>
            </li>
        </ul>
    </nav>
        <div class="centrumStrony">
            <div class="ramka_inputow">
                <div  class="elementKontenera">
                    <h3>Zmiana hasła</h3>
                </div>
                <form method="post" action="zmiana_hasla.php">
                    <div  class="elementKontenera">
                        <input class="c_text_input" type="password" name="aktualne_haslo" id="aktualne_haslo" placeholder="wpisz aktualne hasło"><br>
                    </div>
                    <div  class="elementKontenera">
                        <input class="c_text_input" type="text" name="nowe_haslo1" id="nowe_haslo_1" placeholder="wpisz nowe hasło"><br>
                    </div>
                    <div  class="elementKontenera">
                        <input class="c_text_input" type="text" name="nowe_haslo2" id="nowe_haslo_2" placeholder="wpisz ponownie hasło"><br>
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
                        <input type="hidden" name="typ_eksportu" value="zgloszenia">
                        <input class="przycisk1" type="submit" value="Eksport CSV alokacja kosztow"><br>
                    </div>
                </form>
                <?php
                if($_SESSION['db_organization']=='LIGWAN KJ' || $_SESSION['db_username']=='MateuszKoza'){
                    echo 
                    '<form action="eksport_danych_csv.php" method="post">
                        <div  class="elementKontenera">
                            <input type="hidden" name="typ_eksportu" value="miedzyoperacyjna">
                            <input class="przycisk1" type="submit" value="Eksport CSV miedzyoperacyjna"><br>
                        </div>
                    </form>';
                }
                ?>
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
                        <a href=logowanie.php><input class="przycisk1" type="button" value="POWRÓT"></a><br>
                    </div>



            </div>
        </div>
    
    
</body>
</html>