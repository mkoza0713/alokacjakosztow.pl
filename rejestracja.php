<?php
session_start();
if(isset($_POST['login_uzytkownika'])){
    $organization_name = $_POST['organizacja'];
    $new_user_name = $_POST['login_uzytkownika'];
    $new_user_email = $_POST['email_uzytkownika'];
    $new_user_pass1 = $_POST['haslo_uzytkonika_1'];
    $new_user_pass2 = $_POST['haslo_uzytkonika_2'];

    $poprawne_dane_formularza = true;

    if(strlen($organization_name)<3 || strlen($organization_name)>20){
        $poprawne_dane_formularza=false;
        $_SESSION['e_organizacja']='<span style="color:red"><br>Nazwa organizacji powinna miec od 3 do 20 znaków!</span><br>';
    }
    if(strlen($new_user_name)<3 || strlen($new_user_name)>20){
        $poprawne_dane_formularza=false;
        $_SESSION['e_login']='<span style="color:red"><br>Login powinien miec od 3 do 20 znaków!</span><br>';
    }
    if(ctype_alnum($new_user_name)==false){
        $poprawne_dane_formularza=false;
        $_SESSION['e_login']='<span style="color:red"><br>Login powinien skladać sie z liter i cyfr</span><br>';
    }
    $new_user_email_2 = filter_var($new_user_email, FILTER_SANITIZE_EMAIL);
    if(filter_var($new_user_email, FILTER_VALIDATE_EMAIL)==false || 
    $new_user_email!=$new_user_email_2){
        $poprawne_dane_formularza=false;
        $_SESSION['e_email']='<span style="color:red"><br>Email nie poprawny</span><br>';
    }
    if(strlen($new_user_pass1)<4 || strlen($new_user_pass1)>20){
        $poprawne_dane_formularza=false;
        $_SESSION['e_haslo1']='<span style="color:red"><br>Hasło od 5 do 20 znaków!</span><br>';
    }
    if($new_user_pass1!=$new_user_pass2){
        $poprawne_dane_formularza=false;
        $_SESSION['e_haslo2']='<span style="color:red"><br>Hasła muszą być takie same!</span><br>';
    }
        

    //recaptcha
    $secret_key_recaptcha = "6LfGPKwiAAAAAJHI7YXZU8-EQNzJtuMeVhaSToLn";
    $sprawdz = file_get_contents('https://google.com/recaptcha/api/siteverify?secret='
    .$secret_key_recaptcha.'&response='
    .$_POST['g-recaptcha-response']);
    $opowiedz = json_decode($sprawdz);
    
    if($opowiedz->success==false){
        $poprawne_dane_formularza=false;
        $_SESSION['e_haslo2']='<span style="color:red"><br>Blad re-captcha</span><br>';
    }



    //hashuje haslo do bazy
    $new_user_pass_hash = password_hash($new_user_pass1, PASSWORD_DEFAULT);
    
    require_once "connect.php";
    $polaczenie2 = @new mysqli($host, $db_user, $db_password, $db_name);
    if($polaczenie2->connect_error!=0){
        echo "ERROR: " .$polaczenie2->connect_errno;  //kod bledu na ekranie
    }else{
        $zapytanieSql2 = "SELECT * FROM uzytkownicy 
        WHERE user='$new_user_name'";
        $zapytanieSql3 = "SELECT * FROM uzytkownicy 
        WHERE email='$new_user_email'";

        if($wynik_zapytania = @$polaczenie2->query($zapytanieSql2)){
            $ilosc_wynikow = $wynik_zapytania->num_rows;
            if($ilosc_wynikow>0){
                $poprawne_dane_formularza=false;
                $_SESSION['e_dubel_bazy_login']='<span style="color:red">
                <br>Login zajęty</span><br>';
            }
        }
        if($wynik_zapytania2 = @$polaczenie2->query($zapytanieSql3)){
            $ilosc_wynikow2 = $wynik_zapytania2->num_rows;
            if($ilosc_wynikow2>0){
                $poprawne_dane_formularza=false;
                $_SESSION['e_dubel_bazy_email']='<span style="color:red">
                <br>W bazie istnieje konto z takim samym adresem email</span><br>';
            }
        }
    }
    $polaczenie2->close();

    
    if($poprawne_dane_formularza==true){
        
        //walidacja udana
        $polaczenie3 = @new mysqli($host, $db_user, $db_password, $db_name);
            if($polaczenie3->connect_error!=0){
            echo "ERROR: " .$polaczenie3->connect_errno;  //kod bledu na ekranie
            }else{
                $zapytanieSql4 = "INSERT INTO uzytkownicy VALUES (NULL,'$new_user_name','$new_user_pass_hash','$new_user_email', '$organization_name')";
                if($wynik_zapytania3 = @$polaczenie3->query($zapytanieSql4)){
                    echo "Zapytanie poprawne";
                    $_SESSION['udana_rejestracja']='<div class="elementKontenera">
                    <br>Rejestracja udana</div><br>';
                    header('Location: logowanie.php');
                }
                else{
                    echo "Blad zapytania do bazy";
                }
            }
        $polaczenie3->close();
    }
        

}

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="style_coockie.css">
    <link rel="icon" type="image/png" href="favicon.png">
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7742530928316810"
     crossorigin="anonymous"></script>
</head>
<body>
    <section>
        <nav>

        </nav>
        <div class="centrumStrony">
                <div class="ramka_inputow">
                    <form method="post">
                        <div class="elementKontenera">
                            <h3>Zarejestruj</h3>
                        </div>
                        <div class="elementKontenera">
                            <input type="text" class="c_text_input" name="organizacja" id="organizacja_id" placeholder="Organizacja"><br>
                            <?php 
                            if(isset($_SESSION['e_organizacja'])){
                                echo $_SESSION['e_organizacja'];
                                unset($_SESSION['e_organizacja']);
                            }
                                ?>
                        </div>
                        <div class="elementKontenera">
                            <input type="text" class="c_text_input" name="login_uzytkownika" id="login_uzytkownika_id" placeholder="login"><br>
                            <?php 
                            if(isset($_SESSION['e_login'])){
                                echo $_SESSION['e_login'];
                                unset($_SESSION['e_login']);
                            }
                                ?>
                        </div>
                        <div class="elementKontenera">
                            <input type="text" class="c_text_input" name="email_uzytkownika" id="email_uzytkownika_id" placeholder="email"><br>
                            <?php 
                            if(isset($_SESSION['e_email'])){
                                echo $_SESSION['e_email'];
                                unset($_SESSION['e_email']);
                            }
                                ?>
                        </div>
                        <div class="elementKontenera">
                            <input type="text" class="c_text_input" name="haslo_uzytkonika_1" id="haslo_uzytkownika_1" placeholder="haslo"><br>
                            <?php 
                            if(isset($_SESSION['e_haslo1'])){
                                echo $_SESSION['e_haslo1'];
                                unset($_SESSION['e_haslo1']);
                            }
                                ?>
                        </div>
                        <div class="elementKontenera">
                            <input type="text" class="c_text_input" name="haslo_uzytkonika_2" id="haslo_uzytkownika_2" placeholder="powtórz hasło"><br>
                            <?php 
                            if(isset($_SESSION['e_haslo2'])){
                                echo $_SESSION['e_haslo2'];
                                unset($_SESSION['e_haslo2']);
                            }
                                ?>
                        </div>
                            <div class="elementKontenera">
                                <div class="g-recaptcha" data-sitekey="6LfGPKwiAAAAAAsuu5_VxsUTdBurlBbgowHFO_wK"></div>
                            </div>
                        <div class="elementKontenera">
                            <input  class="przycisk1" type="submit" value="Zarejestruj się"><br><br>

                            <a href=logowanie.php><input  class="przycisk1"  type="button" value="POWRÓT"></a><br>
                        </div>
                        <div class="elementKontenera">
                            <?php
                            if(isset($_SESSION['e_dubel_bazy_login'])){
                            echo $_SESSION['e_dubel_bazy_login'];
                            unset($_SESSION['e_dubel_bazy_login']);
                            }
                            if(isset($_SESSION['e_dubel_bazy_email'])){
                            echo $_SESSION['e_dubel_bazy_email'];
                            unset($_SESSION['e_dubel_bazy_email']);
                            }
                            ?>
                        </div>
                    </form>

                </div>
        </div>
        <footer>
            <script src="coockiePermision.js"></script>
        </footer>
    </section>


    
    
</body>
</html>
<script>
   function onSubmit(token) {
     document.getElementById("demo-form").submit();
   }
 </script>