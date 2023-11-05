<?php
    session_start();

    $klient = $_POST['klient'];
    $zadanie = $_POST['zadanie'];
    $uwagi = $_POST['uwagi'];
    $data_zgloszenia = $_POST['data_zgloszenia'];
    $czas_start = $_POST['czas_start'];
    $czas_stop = $_POST['czas_stop'];
    if(isset($_POST['zakoncz_zad'])){
        $status_zadania = "zakonczone";
    }else{
        $status_zadania = "otwarte";
    }

    $poprawne_dane_formularza = true;

    if(strlen($klient)<=0)$poprawne_dane_formularza=false;
    if(strlen($zadanie)<=0)$poprawne_dane_formularza=false;
    if(strlen($data_zgloszenia)<=0)$poprawne_dane_formularza=false;
    if(strlen($czas_start)<=0)$poprawne_dane_formularza=false;


    if($poprawne_dane_formularza){
        //licze czasochlonnosc
        $czas_start_tablica = explode(":", $czas_start);
        $czas_stop_tablica = explode(":", $czas_stop);
        // $czasochlonnosc_start = $czas_start_tablica[0]*3600 + $czas_start_tablica[1]*60 + $czas_start_tablica[2];
        // $czasochlonnosc_stop = $czas_stop_tablica[0]*3600 + $czas_stop_tablica[1]*60 + $czas_stop_tablica[2];
        $czasochlonnosc_start = $czas_start_tablica[0]*3600 + $czas_start_tablica[1]*60;
        $czasochlonnosc_stop = $czas_stop_tablica[0]*3600 + $czas_stop_tablica[1]*60;
        $czas_trwania_zadania =  $czasochlonnosc_stop-$czasochlonnosc_start;

        //wgrywam do bazy
        require_once "connect.php";
        $polaczenie3 = @new mysqli($host, $db_user, $db_password, $db_name);
        if($polaczenie3->connect_error!=0){
            echo "ERROR: " .$polaczenie3->connect_errno;  //kod bledu na ekranie
        }else{
            $zalogowany_uzytkownik = $_SESSION['db_username'];
            $organizacja_usera = $_SESSION['db_organization'];
            
            if(isset($_SESSION['wiadomosc_edycja_wartosci'])){
                $id_do_edycji=$_SESSION['wiadomosc_edycja_wartosci'];
                $zapytanieSql4 = "UPDATE zgloszenia SET klient='$klient' , zadanie='$zadanie', uwagi='$uwagi' 
                ,data_zgloszenia='$data_zgloszenia', czas_start='$czas_start', status_zadania='$status_zadania'  WHERE id='$id_do_edycji'";
                unset( $_SESSION['wiadomosc_edycja_wartosci']);
            }else{
                $zapytanieSql4 = "INSERT INTO zgloszenia 
                VALUES (NULL,'$zalogowany_uzytkownik','$organizacja_usera','$klient','$zadanie','$uwagi','$data_zgloszenia'
                ,'$czas_start','$czas_stop',$czas_trwania_zadania,'$status_zadania')";
            }
            if($wynik_zapytania5 = $polaczenie3->query($zapytanieSql4)){
                $_SESSION['dodanie_do_bazy']='<br>Dodano do bazy</span><br>';
                header('Location:aplikacja.php');
            }
            else{
                $_SESSION['dodanie_do_bazy']='<br>Nie dodano do bazy</span><br>';
                header('Location:aplikacja.php');
            }
        }
        $polaczenie3->close();

    }else{
        $_SESSION['blad_formularza']='<br>Blad formularza</span><br>';
        header('Location:noweZadanie.php');
    }




?>