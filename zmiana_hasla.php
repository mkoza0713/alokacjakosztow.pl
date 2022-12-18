<?php
session_start();
$aktualne_haslo = $_POST['aktualne_haslo'];
$nowe_haslo_1 = $_POST['nowe_haslo1'];
$nowe_haslo_2 = $_POST['nowe_haslo2'];
$aktualnie_zalogowany_user = $_SESSION['db_username'];

require_once "connect.php";
$polaczenie1 = @new mysqli($host, $db_user, $db_password, $db_name);

if($polaczenie1->connect_error!=0){
    echo "ERROR: " .$polaczenie1->connect_errno;  //kod bledu na ekranie
}else{
    $zapytanieSql1 = "SELECT * FROM uzytkownicy WHERE user='$aktualnie_zalogowany_user'";
if($wynik_zapytania = @$polaczenie1->query($zapytanieSql1)) {
        $wiersz_zapytania = $wynik_zapytania->fetch_assoc();
        $aktualne_haslo_hash = password_hash($aktualne_haslo, PASSWORD_DEFAULT);
        $nowe_haslo_hash = password_hash($nowe_haslo_1, PASSWORD_DEFAULT);

        
        $poprawnosc_danych = true;
        if($nowe_haslo_1!=$nowe_haslo_2){
            $poprawnosc_danych=false;
            $_SESSION['e_pass_change']='<span style="color:red"><br>Hasła musza byc takie same!</span><br>';
            header('Location: ustawienia_konta.php');
        }
        if(strlen($nowe_haslo_1)<4 || strlen($nowe_haslo_1)>20){
            $poprawnosc_danych=false;
            $_SESSION['e_pass_change']='<span style="color:red"><br>Hasło powinno miec od 4 do 20 znakow!</span><br>';
            header('Location: ustawienia_konta.php');
        }
        if(password_verify($aktualne_haslo_hash,$wiersz_zapytania['pass'])){
            $poprawnosc_danych=false;
            $_SESSION['e_pass_change']='<span style="color:red"><br>Stare haslo niepoprawne!</span><br>';
            header('Location: ustawienia_konta.php');
        }

        if($poprawnosc_danych){
            $zapytanieSql2 = "UPDATE uzytkownicy SET pass='$nowe_haslo_hash' WHERE user='$aktualnie_zalogowany_user'";
            if($wynik_zapytania2 = @$polaczenie1->query($zapytanieSql2)) {
                $_SESSION['e_pass_change']='<span style="color:red"><br>Hasło zmienione</span><br>';
                header('Location: ustawienia_konta.php');
            }else{
                $_SESSION['e_pass_change']='<span style="color:red"><br>Dane niepoprawne</span><br>';
                header('Location: ustawienia_konta.php');
            }
        }
    }
    $polaczenie1->close();
}



?>