<?php

session_start();

require_once "connect.php";

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
if($polaczenie->connect_error!=0){
    echo "ERROR: " .$polaczenie->connect_errno;  //kod bledu na ekranie
}else{
    //$user_login = $_POST['user_login']; 
    //$user_password = $_POST['user_password'];

    //sprawdzam czy nie ma znakow specjalnych - wstrzykiwanie sql
    $user_login = htmlentities($_POST['user_login'], ENT_QUOTES, "UTF-8");
    $user_password = htmlentities($_POST['user_password'], ENT_QUOTES, "UTF-8");
    $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);

    //$zapytanieSql1 = "SELECT * FROM uzytkownicy WHERE user='$user_login'";

    // $zapytanieSql1 = sprintf("SELECT * FROM uzytkownicy WHERE user='%s'", 
    // mysqli_real_escape_string($polaczenie, $user_login));

    if($rezultat_zapytania = @$polaczenie->query(sprintf("SELECT * FROM uzytkownicy WHERE user='%s'", 
    mysqli_real_escape_string($polaczenie, $user_login)))){
        $ilosc_userow = $rezultat_zapytania->num_rows;
        if($ilosc_userow>0){
            $wiersz_zapytania = $rezultat_zapytania->fetch_assoc();  //rozbijam wyniki na pojedyncze elementy tablicy asocjacyjnej
            if(password_verify($user_password,$wiersz_zapytania['pass'])){

                //tworze zmienne sesyjne
                $_SESSION['status_logowania']=true;
                $_SESSION['id']=$wiersz_zapytania['id'];
                $_SESSION['db_organization']=$wiersz_zapytania['organizacja'];
                $_SESSION['db_username']=$wiersz_zapytania['user'];
                $_SESSION['db_email']=$wiersz_zapytania['email'];

                unset($_SESSION['blad']);  //usuwam z sesji całkowicie info o bledzie
                $rezultat_zapytania->free_result();  //wyczyszczeniie zmienneych z pamieci
                header('Location: aplikacja.php');
            }else{
                $_SESSION['blad']=
                '<span style="color:red"><br>Nieprawidlowe haslo!</span>';
                header('Location: index.php'); //przekierowuje do strony logowania
            }


        }else{
            //brak userow w bazie
            $_SESSION['blad']=
            '<span style="color:red"><br>Nieprawidlowy login lub haslo!</span>';
             header('Location: index.php'); //przekierowuje do strony logowania
            }
        }
        
        $polaczenie->close();
    }


?>