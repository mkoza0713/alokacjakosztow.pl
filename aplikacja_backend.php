<?php
session_start();
$id_do_zamkniecia = $_POST['wiadomosc'];
require_once "connect.php";
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    if($polaczenie->connect_error!=0){
        echo "ERROR: " .$polaczenie->connect_errno;  //kod bledu na ekranie
    }else{
        $zapytanie2 = "SELECT * FROM zgloszenia WHERE id='$id_do_zamkniecia'";
        if($wynik_zapytania2 = @$polaczenie->query($zapytanie2)){
            $wiersz_zapytania2 = $wynik_zapytania2->fetch_assoc();
            //licze czasochlonnosc:

            $czas_stop = date('H:i:s');
            $czas_start_tablica = explode(":", $wiersz_zapytania2['czas_start']);
            $czas_stop_tablica = explode(":", date('H:i:s'));
            $czasochlonnosc_start = $czas_start_tablica[0]*3600 + $czas_start_tablica[1]*60 + $czas_start_tablica[2];
            $czasochlonnosc_stop = $czas_stop_tablica[0]*3600 + $czas_stop_tablica[1]*60 + $czas_stop_tablica[2];
            $czas_trwania_zadania =  $czasochlonnosc_stop-$czasochlonnosc_start;
            if($czas_trwania_zadania<=0)$czas_trwania_zadania=0;

            $zapytanie1 = "UPDATE zgloszenia SET czasochlonnosc = '$czas_trwania_zadania' , status_zadania='zakonczone', czas_stop = '$czas_stop' WHERE id='$id_do_zamkniecia'";
            if(@$polaczenie->query($zapytanie1)){
                header('Location:aplikacja.php');
            }else{
                echo "Blad polaczenia z baza";
            }
        }else{
            echo "Blad polaczenia z baza";
        }
    }
$polaczenie->close();



//header('Location:aplikacja.php');
?>