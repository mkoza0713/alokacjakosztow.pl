<?php
session_start();


//Przypadek dla dodania klienta
if(isset($_POST['nowy_klient'])){
    $nowy_klient_do_bazy = $_POST['nowy_klient'];
    $nowy_klient_do_bazy=strtoupper($nowy_klient_do_bazy);

    //walidacja dancyh wejsciowych
    $walidacja_formularza = true;

    if(strlen($nowy_klient_do_bazy)<=0)$walidacja_formularza=false;
    
    
    if($walidacja_formularza){
        require_once "connect.php";
        $polaczenie1 = @new mysqli($host, $db_user, $db_password, $db_name);
        if($polaczenie1->connect_error!=0){
            echo "ERROR: " .$polaczenie1->connect_errno;  //kod bledu na ekranie
        }else{
            $organizacja_usera = $_SESSION['db_organization'];
            $zapytanieSql1 = "INSERT INTO klienci VALUES (NULL, '$organizacja_usera', '$nowy_klient_do_bazy')";
            if($wynik_zapytania1 = $polaczenie1->query($zapytanieSql1)){
                header('Location:dodanieKlienta.php');
    
            }else{
                header('Location:dodanieKlienta.php');
            }
        }
    }else{
        header('Location:dodanieKlienta.php');
    }
    $polaczenie1->close();
}

//przypadek dla usuniecia klienta
if(isset($_POST['wiadomosc'])){
    $id_do_usuniecia = $_POST['wiadomosc'];require_once "connect.php";
    $polaczenie2 = @new mysqli($host, $db_user, $db_password, $db_name);
        if($polaczenie2->connect_error!=0){
            echo "ERROR: " .$polaczenie2->connect_errno;  //kod bledu na ekranie
        }else{
            $zapytanieSql2 = "DELETE FROM klienci WHERE id='$id_do_usuniecia'";
            if($wynik_zapytania2 = @$polaczenie2->query($zapytanieSql2)){
                header('Location:dodanieKlienta.php ');
            }
        }
}else{
    header('Location:dodanieKlienta.php ');
}

?>