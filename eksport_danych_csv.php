<?php
session_start();

require_once "connect.php";

$polaczenie1 = @new mysqli($host, $db_user, $db_password, $db_name);
if($polaczenie1->connect_error!=0){
    echo "ERROR: " .$polaczenie1->connect_errno;  //kod bledu na ekranie
}else{
    $organizacja_usera = $_SESSION['db_organization'];
    $zapytanieSql1 = "SELECT * FROM zgloszenia WHERE organizacja='$organizacja_usera'";
    if($wynik_zapytania1 = $polaczenie1->query($zapytanieSql1)){
        
        $fileName='dane.csv';
        $fp = fopen($fileName, 'w');

        while($wiersz_zapytania = $wynik_zapytania1->fetch_assoc()){
            $wiersz_Zapytania_1 = $wiersz_zapytania['data_zgloszenia']."\t".
            $wiersz_zapytania['czas_start']."\t".
            $wiersz_zapytania['czas_stop']."\t".
            $wiersz_zapytania['uzytkownik']."\t".
            $wiersz_zapytania['zadanie']."\t".
            $wiersz_zapytania['klient']."\t".
            $wiersz_zapytania['czasochlonnosc'].
            $wiersz_zapytania['uwagi'].
            "\n";
            fwrite($fp, $wiersz_Zapytania_1);
            }
        fclose($fp);
        
        if (file_exists($fileName)) {
            header('Content-Type: text/html; charset=utf-8');
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($fileName).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($fileName));
            readfile($fileName);
            exit;
        }
        else{  
            header('Location:index.php');
        }

    }else{
        $_SESSION['blad_eksportu']='<span style="color:red">
        <br>Blad eksportu</span><br>';
        header('Location:index.php');
    }
    header('Location:index.php');
}









?>