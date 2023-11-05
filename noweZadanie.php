<?php
session_start();
require_once "connect.php";
$organizacjaUsera = $_SESSION['db_organization'];           
$_SESSION['klient_edit']="";
$_SESSION['zadanie_edit']="";
$_SESSION['uwagi_edit']="";
$_SESSION['data_edit']= date('Y-m-d');
$_SESSION['czas_start_edit']=date("H:i");
$_SESSION['przycisk_tresc']="Rozpocznij zadanie";



//jezeli odpalam formularz z poziomu edycji zadania
if(isset($_POST['wiadomosc_edycja_wartosci'])){
    $idDoEdycji = $_POST['wiadomosc_edycja_wartosci'];
    $_SESSION['wiadomosc_edycja_wartosci']=$idDoEdycji;
    $polaczenie3= @new mysqli($host, $db_user, $db_password, $db_name);
    if($polaczenie3->connect_error!=0){
        echo "ERROR: ".$polaczenie3->connect_errno;;
    }else{
        $zapytanieSql3 = "SELECT * FROM zgloszenia WHERE organizacja = '$organizacjaUsera' AND id = '$idDoEdycji'";
        if($wynik_zapytania3 = $polaczenie3->query($zapytanieSql3)){
            $wierszZapytania3=$wynik_zapytania3->fetch_assoc();
            $_SESSION['klient_edit']=$wierszZapytania3['klient'];
            $_SESSION['zadanie_edit']=$wierszZapytania3['zadanie'];
            $_SESSION['uwagi_edit']=$wierszZapytania3['uwagi'];
            $_SESSION['data_edit']=$wierszZapytania3['data_zgloszenia'];
            $_SESSION['czas_start_edit']=$wierszZapytania3['czas_start'];
            $_SESSION['przycisk_tresc']="Edytuj zadanie";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nowe_zadanie</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="icon" type="image/png" href="favicon.png">
</head>
<body>
    <nav>

    </nav>
    <div class="centrumStrony">
            <div class="ramka_inputow">
                <form action="noweZadanieBackend.php" method="post">
                    <div class="elementKontenera">
                        <label for="klient_id">Klient</label><br>
                        <select  class="c_text_input" name="klient" id="klient_id">
                            <?php
                                $polaczenie1 = @new mysqli($host, $db_user, $db_password, $db_name);
                                if($polaczenie1->connect_error!=0){
                                    echo "ERROR: " .$polaczenie1->connect_errno;  //kod bledu na ekranie
                                }else{
                                    $zapytanieSql1 = "SELECT * FROM klienci WHERE organizacja = '$organizacjaUsera'";
                                    if($wynik_zapytania1 = $polaczenie1->query($zapytanieSql1)){
                                        echo '<option selected value="'.$_SESSION['klient_edit'].'">'.$_SESSION['klient_edit'].'</option>';
                                        while ($wierszZapytania1=$wynik_zapytania1->fetch_assoc()){
                                            echo '<option value="'.$wierszZapytania1['klient'].'">'.$wierszZapytania1['klient'].'</option>';
                                        }
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="elementKontenera">
                        <label for="zadanie_id">Zadanie</label><br>
                        <select  class="c_text_input" name="zadanie" id="zadanie_id">
                            <?php
                                 $polaczenie2 = @new mysqli($host, $db_user, $db_password, $db_name);
                                 if($polaczenie2->connect_error!=0){
                                     echo "ERROR: " .$polaczenie2->connect_errno;  //kod bledu na ekranie
                                 }else{
                                     $zapytanieSql2 = "SELECT * FROM zadania WHERE organizacja = '$organizacjaUsera'";
                                     if($wynik_zapytania2 = $polaczenie2->query($zapytanieSql2)){
                                         echo '<option selected value="'.$_SESSION['zadanie_edit'].'">'.$_SESSION['zadanie_edit'].'</option>';
                                         while ($wierszZapytania2=$wynik_zapytania2->fetch_assoc()){
                                             echo '<option value="'.$wierszZapytania2['zadanie'].'">'.$wierszZapytania2['zadanie'].'</option>';
                                         }
                                     }
                                 }                           
                            ?>
                        </select>
                    </div>
                    <div class="elementKontenera">
                        <label for="uwagi_id">Uwagi</label><br>
                        <input  class="c_text_input" type="text" name="uwagi" id="uwagi_id" value="<?php echo $_SESSION['uwagi_edit']; ?>">
                    </div>
                    <div class="elementKontenera">
                         <label for="data_zgloszenia_id">Data zgłoszenia</label><br>
                        <input class="c_text_input" type="date" name="data_zgloszenia" id="data_zgloszenia_id" value="<?php echo $_SESSION['data_edit']; ?>">
                    </div>
                    <div class="elementKontenera">
                        <label for="czas_start_id">Czas start</label><br>
                        <input class="c_text_input" type="time" name="czas_start" id="czas_start_id" value="<?php echo $_SESSION['czas_start_edit']; ?>">
                    </div>
                    <div class="elementKontenera">
                        <label for="czas_stop_id">Czas stop</label><br>
                        <input class="c_text_input" type="time" name="czas_stop" id="czas_stop_id" value="<?php echo date("H:i"); ?>">
                    </div>
                    <div class="elementKontenera">
                        <label for="zamknac_zadanie_id">Zakończ zadanie</label><br>
                        <input type="checkbox" id="zamknac_zadanie_id" name="zakoncz_zad" value="Zakoncz" />
                    </div>
                    <div class="elementKontenera">
                        <input class="przycisk1" type="submit" value="<?php echo $_SESSION['przycisk_tresc'];?>"><br><br>
                    </div>
                    <div class="elementKontenera">
                        <a href="logowanie.php"><input class="przycisk1" type="button" value="POWRÓT"></a>
                    </div>
                    <?php
                        if(isset($_SESSION['blad_formularza'])){
                            echo $_SESSION['blad_formularza'];
                            unset($_SESSION['blad_formularza']);
                        }
                        unset( $_SESSION['klient_edit']);
                        unset( $_SESSION['zadanie_edit']);
                        unset( $_SESSION['uwagi_edit']);
                        unset( $_SESSION['data_edit']);
                        unset( $_SESSION['czas_start_edit']);
                        unset( $_SESSION['przycisk_tresc']);
                    ?>
                </form>
            </div>
            
    </div>
    <footer>
            <!-- <script src="coockiePermision.js"></script> -->
    </footer>
    
    
</body>
</html>