<?php
session_start();
if(!isset($_SESSION['status_logowania'])){
    header('Location: index.php');
    exit();
}
if($_SESSION['db_organization']!="LIGWAN DTC" && $_SESSION['db_organization']!="LIGWAN KJ"){   //tylko dla konkretnej organizacji
    header('Location: aplikacja.php');
    exit();
}



$test_poprawnosci_formularza = true;

$id_kontrolera = $_SESSION['db_username'];
$data = date('Y-m-d-H-i-s');
$operator = $_POST['n_operator'];
$brygada = $_POST['n_brygada'];
$zlecenie = $_POST['n_zlecenie'];
$pnwyrobu = $_POST['n_pnwyrobu'];   
$stanowisko = $_POST['n_stanowisko'];   
$czynnosc = $_POST['n_czynnosc'];

if(strlen($operator)!=6)$test_poprawnosci_formularza=false;
if(strlen($brygada)<=0)$test_poprawnosci_formularza=false;  
if(strlen($zlecenie)<=0)$test_poprawnosci_formularza=false;
if(strlen($pnwyrobu)<=0)$test_poprawnosci_formularza=false;
if(strlen($stanowisko)<=0)$test_poprawnosci_formularza=false;
if(strlen($czynnosc)<=0)$test_poprawnosci_formularza=false;


$pytanie_1 = $_POST['question1'];
$pytanie_2 = $_POST['question2'];
$pytanie_3 = $_POST['question3'];       
$pytanie_4 = $_POST['question4'];
$pytanie_5 = $_POST['question5'];
$pytanie_6 = $_POST['question6'];
$pytanie_7 = $_POST['question7'];
$pytanie_8 = $_POST['question8'];
$pytanie_9 = $_POST['question9'];
$pytanie_10 = $_POST['question10'];

if(strlen($pytanie_1)<=0)$test_poprawnosci_formularza=false;
if(strlen($pytanie_2)<=0)$test_poprawnosci_formularza=false;
if(strlen($pytanie_3)<=0)$test_poprawnosci_formularza=false;
if(strlen($pytanie_4)<=0)$test_poprawnosci_formularza=false;
if(strlen($pytanie_5)<=0)$test_poprawnosci_formularza=false;
if(strlen($pytanie_6)<=0)$test_poprawnosci_formularza=false;
if(strlen($pytanie_7)<=0)$test_poprawnosci_formularza=false;
if(strlen($pytanie_8)<=0)$test_poprawnosci_formularza=false;
if(strlen($pytanie_9)<=0)$test_poprawnosci_formularza=false;
if(strlen($pytanie_10)<=0)$test_poprawnosci_formularza=false;

$uzasadnienie_1 = $_POST['answer1'];
$uzasadnienie_2 = $_POST['answer2'];
$uzasadnienie_3 = $_POST['answer3'];    
$uzasadnienie_4 = $_POST['answer4'];
$uzasadnienie_5 = $_POST['answer5'];
$uzasadnienie_6 = $_POST['answer6'];
$uzasadnienie_7 = $_POST['answer7'];
$uzasadnienie_8 = $_POST['answer8'];
$uzasadnienie_9 = $_POST['answer9'];
$uzasadnienie_10 = $_POST['answer10'];

$uwagi = $_POST['n_uwagi_koncowe'];





if($test_poprawnosci_formularza){
    require_once "connect.php";
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    if($polaczenie->connect_error!=0){
        echo "ERROR: " .$polaczenie->connect_errno;  //kod bledu na ekranie
    }else{  
        $zapytaniesql_1 = "INSERT INTO in_process_control VALUES 
    (NULL, '$id_kontrolera', '$data', '$operator', '$brygada', '$zlecenie', '$pnwyrobu', '$stanowisko', '$czynnosc', 
    '$pytanie_1', '$pytanie_2', '$pytanie_3', '$pytanie_4', '$pytanie_5', '$pytanie_6', 
    '$pytanie_7', '$pytanie_8', '$pytanie_9', '$pytanie_10', 
    '$uzasadnienie_1', '$uzasadnienie_2', '$uzasadnienie_3', '$uzasadnienie_4', 
    '$uzasadnienie_5', '$uzasadnienie_6', '$uzasadnienie_7', '$uzasadnienie_8', 
    '$uzasadnienie_9', '$uzasadnienie_10', '$uwagi')";
    
        if(@$polaczenie->query($zapytaniesql_1)){
            //echo "dodano do bazy";
            $_SESSION['status_db'] = 1;
            header('Location:qualityForm.php');
        }else{
            //echo "Blad polaczenia z baza";
            $_SESSION['status_db'] = 0;
            header('Location:qualityForm.php');
        }
    }
    $polaczenie->close();

}else{
    $_SESSION['status_db'] = "Błąd formularza!";
    header('Location:qualityForm.php');
    exit();
}

?>
