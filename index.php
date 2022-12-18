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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <nav>
            
        </nav>
        <div class="centrumStrony">
                <div class="ramka_inputow">
                    <form action="logowanie.php" method="post">
                        <div class="elementKontenera">
                        <h3>Zaloguj</h3>
                        </div>
                        <div class="elementKontenera">
                            <input type="text" name="user_login" id="login_id" placeholder="login"><br>
                        </div>
                        <div class="elementKontenera">
                            <input type="password" name="user_password" id="pass_id" placeholder="hasło"><br>
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
                            <a href='rejestracja.php'>Zarejestruj się</a>
                        </div>
                    </form>      
                </div>
                
            <?php
            if(isset($_SESSION['udana_rejestracja'])){
                echo $_SESSION['udana_rejestracja'];
            }
            ?>
        </div>
        <footer>
                    
        </footer>
    </section>
    
</body>
</html>