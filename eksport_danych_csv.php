<?php
session_start();

require_once "connect.php";

$typ_zgloszenia = $_POST['typ_eksportu'];


    $polaczenie1 = @new mysqli($host, $db_user, $db_password, $db_name);
    if($polaczenie1->connect_error!=0){
        echo "ERROR: " .$polaczenie1->connect_errno;  //kod bledu na ekranie
    }else{
        if($typ_zgloszenia == 'zgloszenia'){
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
                    $wiersz_zapytania['czasochlonnosc']."\t".
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
        }else if($typ_zgloszenia == 'miedzyoperacyjna'){  /********************************************************************* */          
            $organizacja_usera = $_SESSION['db_organization'];
            $zapytanieSql2 = "SELECT * FROM in_process_control";
            if($wynik_zapytania1 = $polaczenie1->query($zapytanieSql2)){
                
                $fileName='mop.csv';
                $fp = fopen($fileName, 'w');
                $naglowki = "ID\tControler ID\tData\tOperator\tBrygada\tZlecenie\tPN Wyrobu\tStanowisko\tCzynność\t" .
                    "Pytanie 1\tUzasadnienie 1\tPytanie 2\tUzasadnienie 2\tPytanie 3\tUzasadnienie 3\t" .
                    "Pytanie 4\tUzasadnienie 4\tPytanie 5\tUzasadnienie 5\tPytanie 11\tUzasadnienie 11\t" .
                    "Pytanie 6\tUzasadnienie 6\tPytanie 7\tUzasadnienie 7\tPytanie 8\tUzasadnienie 8\t" .
                    "Pytanie 9\tUzasadnienie 9\tPytanie 10\tUzasadnienie 10\tUwagi\tStart formularza\tStop formularza\n";
                fwrite($fp, $naglowki);
                while($wiersz_zapytania = $wynik_zapytania1->fetch_assoc()){
                    $wiersz_Zapytania_1 = 
                    $wiersz_zapytania['id']."\t".
                    $wiersz_zapytania['controler_id']."\t".
                    $wiersz_zapytania['data']."\t".
                    $wiersz_zapytania['operator']."\t".
                    $wiersz_zapytania['brygada']."\t".
                    $wiersz_zapytania['zlecenie']."\t".
                    $wiersz_zapytania['pnwyrobu']."\t".
                    $wiersz_zapytania['stanowisko']."\t".
                    $wiersz_zapytania['czynnosc']."\t".
                    $wiersz_zapytania['pytanie_1']."\t".
                    $wiersz_zapytania['uzasadnienie_1']."\t".
                    $wiersz_zapytania['pytanie_2']."\t".
                    $wiersz_zapytania['uzasadnienie_2']."\t".
                    $wiersz_zapytania['pytanie_3']."\t".
                    $wiersz_zapytania['uzasadnienie_3']."\t".
                    $wiersz_zapytania['pytanie_4']."\t".
                    $wiersz_zapytania['uzasadnienie_4']."\t".
                    $wiersz_zapytania['pytanie_5']."\t".
                    $wiersz_zapytania['uzasadnienie_5']."\t".
                    $wiersz_zapytania['pytanie_11']."\t".
                    $wiersz_zapytania['uzasadnienie_11']."\t".
                    $wiersz_zapytania['pytanie_6']."\t".
                    $wiersz_zapytania['uzasadnienie_6']."\t".
                    $wiersz_zapytania['pytanie_7']."\t".
                    $wiersz_zapytania['uzasadnienie_7']."\t".
                    $wiersz_zapytania['pytanie_8']."\t".
                    $wiersz_zapytania['uzasadnienie_8']."\t".
                    $wiersz_zapytania['pytanie_9']."\t".
                    $wiersz_zapytania['uzasadnienie_9']."\t".
                    $wiersz_zapytania['pytanie_10']."\t".
                    $wiersz_zapytania['uzasadnienie_10']."\t".
                    $wiersz_zapytania['uwagi']."\t".
                    $wiersz_zapytania['czas_start_form']."\t".
                    $wiersz_zapytania['czas_stop_form']."\t".
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
    }
    $polaczenie1->close();

?>
