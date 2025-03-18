<?php
        session_start();
        
        if(!isset($_SESSION['status_logowania'])){
            header('Location: index.php');
            exit();
        }

        if($_SESSION['db_organization']!="LIGWAN DTC" && $_SESSION['db_organization']!="LIGWAN KJ"){    //tylko dla konkretnej organizacji
            header('Location: aplikacja.php');
            exit();
        }

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="stoper - chronometraż z zapisem do pliku oraz mini cms do alokowania kosztów">
    <meta name="keywords" content="stoper, chronometraż, chronometr, alokacja kosztów, 
    alokowanie, mini-cms, stoper z zapisem, chronometer, plik, chronometr z plikiem, stoper z zapisem do pliku xls,
    stoper z zapisem do pliku download, stoper download, stoper z zapisem do pliku, stoper z plikiem, licznik godzin, 
    wynik stopera do pliku, rejestracja czasu pracy, rejestracja pracy, zliczanie casu pracy, controlling, logowanie pracowników, 
    aplikacja do śledzenia czasu pracy, ewidencja czasu pracy, ewidencja godzin">
    <meta name="author" content="Mateusz Koza">
    <title>Stoper</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="styleStopWath.css">
    <link rel="stylesheet" href="style_coockie.css">
    <link rel="icon" type="image/png" href="favicon.png">
    <script src="script.js"></script>
<body>
    <section>
        <nav>
            <ul class="list0">
                <li class="list1">
                    Menu
                    <ul class="list1_2">
                            <a class="list1_2_element" href=logowanie.php><?php
                            if(isset($_SESSION['status_logowania']) && $_SESSION['status_logowania']==true){
                                echo "Panel użytkownika";
                            }else{
                                echo "Logowanie";
                            }                
                            ?> </a>
                            <a class="list1_2_element" href="politykaPrywatnosci.php">Polityka prywatności</a>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="centrumStrony">
                <!-- elementy strony -->
                <div class="elementKontenera">
                    <?php  
                    if(isset($_SESSION['status_db'])){
                        if($_SESSION['status_db']==1){
                            echo '<h1 style="color: green">Dodano do bazy</h1>';
                            echo '<h1 style="color: green">Uzyskany wynik to '.$_SESSION['wynik_formularza'].'/10</h1>';
                        }else{
                            echo '<h1 style="color: red">Błąd formularza</h1>';
                        }
                        unset($_SESSION['wynik_formularza']);
                        unset($_SESSION['status_db']);
                    }

                    ?>
                            
                
                    <form action="qualityForm_be.php" method="post">
                            <h4>Operator</h4>
                            <input type="text" name="n_operator" id="id_operator" placeholder="id operatora">
                            
                            <label for="brygada"><h4>Brygada</h4></label>
                            <input list="brygada" name="n_brygada" id="id_brygada">
                            <datalist id="brygada">
                                <option value="ABSOLUTNE ASY">
                                <option value="ATOMÓWKI">
                                <option value="BYSTRZAKI">
                                <option value="PSZCZÓŁKI">
                                <option value="SŁONECZKA">
                                <option value="STOKROTKI">
                            </datalist>

                            <h4>Zlecenie produkcyjne</h4>
                            <input type="text" name="n_zlecenie" id="id_uruchomienie" placeholder="np. ZSK/...">
                            
                            <h4>PN wyrobu</h4>
                            <input type="text" name="n_pnwyrobu" id="id_pnwyrobu" placeholder="np. 373...">
                            
                            <label for="stanowisko"><h4>Stanowisko</h4></label>
                            <input list="stanowisko" name="n_stanowisko" id="id_stanowisko">
                            <datalist id="stanowisko">
                                <option value="AUTO-TEST">
                                <option value="CNK">
                                <option value="CNK-OP/0">
                                <option value="CP-ES">
                                <option value="CP-EW">
                                <option value="CP-EW 16-150">
                                <option value="CP-EWzc">
                                <option value="CP-MS">
                                <option value="CP-PS">
                                <option value="CP-SC">
                                <option value="CP-ZAA">
                                <option value="CP-ZAA565">
                                <option value="CP-ZAG">
                                <option value="CWE">
                                <option value="CW-EW/0">
                                <option value="KARUZELA">
                                <option value="KOOP/OUT">
                                <option value="LUT-TYG/0">
                                <option value="LUT-TYG/Pb">
                                <option value="M/0">
                                <option value="MOD-EKR/0">
                                <option value="M-SMD/0">
                                <option value="MT/0">
                                <option value="OB/0">
                                <option value="OB-TAS/0">
                                <option value="ODIZ-2300">
                                <option value="ODIZ-2600s">
                                <option value="ODIZ-JS">
                                <option value="ODIZ-ZF">
                                <option value="PMR">
                                <option value="TAS/0">
                                <option value="TAS-M">
                                <option value="TECH">
                                <option value="TEST-G">
                                <option value="TEST-HV">
                                <option value="TEST-O/0">
                                <option value="WE/0">
                                <option value="WTRYSK">
                                <option value="ZGRZEW">
                                <option value="ZGRZEW OPOROWY">
                                <option value="ZPA/0">
                                <option value="ZPA-SC">
                                <option value="ZPA-SCEW/0">
                                <option value="ZPA-SP">
                                <option value="ZPA-T">
                                <option value="ZR-EW/0">
                                <option value="ZR-G/0">
                                <option value="ZR-IDC">
                                <option value="ZR-K/0">
                                <option value="ZR-Klem">
                                <option value="ZR-PP19">
                                <option value="ZR-PP8/0">
                                <option value="ZR-RJ/0">
                                <option value="ZR-TOCZ">
                                <option value="ZR-TUL/0">
                                <option value="ZZ-PAK">
                                <option value="ZZ-ZAM">
                            </datalist>
                            
                            <label for="czynnosc"><h4>Czynność</h4></label>
                            <input list="czynnosc" name="n_czynnosc" id="id_czynnosc">
                            <datalist id="czynnosc">
                                <option value="C-KP">
                                <option value="C-LED">
                                <option value="C-LISTWY">
                                <option value="CNK">
                                <option value="CNK-OP">
                                <option value="CP ">
                                <option value="CP-CYN">
                                <option value="CP-KON">
                                <option value="CP-R 120">
                                <option value="CP-TAŚ">
                                <option value="CP-TEL">
                                <option value="CP-TEL+ZW">
                                <option value="CP-WZ ">
                                <option value="CP-ZA">
                                <option value="CP-ZA-CYN">
                                <option value="CP-ZA-SIL">
                                <option value="CP-ZN">
                                <option value="CPzT">
                                <option value="CP+ZW">
                                <option value="CRK">
                                <option value="C-TERM">
                                <option value="CTM">
                                <option value="CTU">
                                <option value="C-US">
                                <option value="CWE">
                                <option value="CWS">
                                <option value="CYN">
                                <option value="CYN+ODIZ">
                                <option value="CYN-Pb">
                                <option value="DEMONTAŻ">
                                <option value="KLEJ-ZŁ">
                                <option value="KOMPLETOWANIE">
                                <option value="KOR-CYN">
                                <option value="KOR-CZYSZ">
                                <option value="LUTOWANIE">
                                <option value="LUTOWANIE-Pb">
                                <option value="MB">
                                <option value="M-DŁAW">
                                <option value="ME">
                                <option value="MF">
                                <option value="M-KOSZULKI">
                                <option value="M-KP">
                                <option value="MO">
                                <option value="M-OBUD">
                                <option value="MODELOWANIE">
                                <option value="M-ODG">
                                <option value="M-OSŁONY">
                                <option value="M-OZ">
                                <option value="M-PRZEP">
                                <option value="M-TAŚMYMIEDŹ">
                                <option value="MU">
                                <option value="M-USZCZ">
                                <option value="M-WAGO">
                                <option value="M-WIĄZKI">
                                <option value="M-WTYCZKI">
                                <option value="M-W-ZŁĄCZU">
                                <option value="M-ZŁĄCZA">
                                <option value="NITOWANIE">
                                <option value="OB">
                                <option value="ODIZ">
                                <option value="ODIZ-SEKW">
                                <option value="OP-ZŁĄCZA">
                                <option value="OZN-ZAC">
                                <option value="PAK">
                                <option value="POPRAWA">
                                <option value="POZOSTAŁE">
                                <option value="PP">
                                <option value="ROZCINANIE">
                                <option value="ROZC-OPISEK">
                                <option value="ROZWIERCANIE">
                                <option value="SKRACANIE">
                                <option value="SKRACANIE-TUL">
                                <option value="SKR-PRZEW">
                                <option value="SPLICE">
                                <option value="TAŚM-MIEJSCOWE">
                                <option value="TAŚMOWANIE">
                                <option value="TEST">
                                <option value="TEST-BRZ">
                                <option value="WE">
                                <option value="WERYFIKACJA">
                                <option value="WRAP">
                                <option value="WTRYSK">
                                <option value="WYB-OTW">
                                <option value="WYC-ŻYŁ">
                                <option value="WYK-WIĄZ">
                                <option value="ZATW-BRYG">
                                <option value="ZATW-TECH">
                                <option value="ZGRZEW">
                                <option value="ZGRZEW-OPOROWY">
                                <option value="Z-IDC">
                                <option value="ZPA">
                                <option value="ZPA-2x">
                                <option value="ZPA-T">
                                <option value="ZPA-W">
                                <option value="ZR">
                                <option value="ZR-2x">
                                <option value="Z-RJ">
                                <option value="ZR-MTA">
                                <option value="ZR-W">
                                <option value="Z-TOCZ">
                                <option value="ZWIJANIE-PRZEW">
                                <option value="CP-MS">
                            </datalist>
                            <hr>


                            <h4> Czy operator zanim przystąpił do operacji wykonał czynności zawarte w TPM? 
                                (Czy wiesz na co zwrócić uwagę przy stanowisku zanim przystąpisz do pracy?)</h4>
                            <input type="radio" id="id_option1_1" value="TAK" name="question1">
                            <label for="id_option1_1">TAK</label>
                            <input type="radio" id="id_option1_2" value="NIE" name="question1">
                            <label for="id_option1_2">NIE</label>
                            <input type="text" name="answer1" id="id_answer1" placeholder="Uzasadnienie odpowiedzi">
                            <hr>

                            <h4> Czy operator zapoznał się z instrukcją TWI na danym stanowisku? 
                                (Czy wiesz jak wykonywać przydzieloną pracę?)</h4>
                            <input type="radio" id="id_option2_1" value="TAK" name="question2">
                            <label for="id_option2_1">TAK</label>
                            <input type="radio" id="id_option2_2" value="NIE" name="question2">
                            <label for="id_option2_2">NIE</label>
                            <input type="text" name="answer2" id="id_answer2" placeholder="Uzasadnienie odpowiedzi">
                            <hr>

                            <h4> Czy operator korzysta z CP dla  wykonywanej operacji?</h4>
                            <input type="radio" id="id_option3_1" value="TAK" name="question3">
                            <label for="id_option3_1">TAK</label>
                            <input type="radio" id="id_option3_2" value="NIE" name="question3">
                            <label for="id_option3_2">NIE</label>
                            <input type="text" name="answer3" id="id_answer3" placeholder="Uzasadnienie odpowiedzi">
                            <hr>

                            <h4> Czy operator wie na czym polega kontrola międzyoperacyjna oraz kontrola pierwszej sztuki?</h4>
                            <input type="radio" id="id_option4_1" value="TAK" name="question4">
                            <label for="id_option4_1">TAK</label>
                            <input type="radio" id="id_option4_2" value="NIE" name="question4">
                            <label for="id_option4_2">NIE</label>
                            <input type="text" name="answer4" id="id_answer4" placeholder="Uzasadnienie odpowiedzi">
                            <hr>

                            <h4> Czy operator wykonał kontrolę międzyoperacyjną i kontrolę pierwszej sztuki?</h4>
                            <input type="radio" id="id_option5_1" value="TAK" name="question5">
                            <label for="id_option5_1">TAK</label>
                            <input type="radio" id="id_option5_2" value="NIE" name="question5">
                            <label for="id_option5_2">NIE</label>
                            <input type="text" name="answer5" id="id_answer5" placeholder="Uzasadnienie odpowiedzi">
                            <hr>

                            <h4>  Czy operator ma otwarty dokument i potrafi wskazać informacje niezbędne dla czynności, którą wykonuje?</h4>
                            <input type="radio" id="id_option6_1" value="TAK" name="question6">
                            <label for="id_option6_1">TAK</label>
                            <input type="radio" id="id_option6_2" value="NIE" name="question6">
                            <label for="id_option6_2">NIE</label>
                            <input type="text" name="answer6" id="id_answer6" placeholder="Uzasadnienie odpowiedzi">
                            <hr>

                            <h4>  Czy operator wie jakie ma kompetencje wg "Mapy kompetencji" na danym stanowisku?</h4>
                            <input type="radio" id="id_option7_1" value="TAK" name="question7">
                            <label for="id_option7_1">TAK</label>
                            <input type="radio" id="id_option7_2" value="NIE" name="question7">
                            <label for="id_option7_2">NIE</label>
                            <input type="text" name="answer7" id="id_answer7" placeholder="Uzasadnienie odpowiedzi">
                            <hr>

                            <h4>  Czy operator wie jak postępować w przypadku wykrycia niezgodności?</h4>
                            <input type="radio" id="id_option8_1" value="TAK" name="question8">
                            <label for="id_option8_1">TAK</label>
                            <input type="radio" id="id_option8_2" value="NIE" name="question8">
                            <label for="id_option8_2">NIE</label>
                            <input type="text" name="answer8" id="id_answer8" placeholder="Uzasadnienie odpowiedzi">
                            <hr>    

                            <h4>  Czy operator ma prawidłowo ustawiony licznik? 
                                (Czy licznik jest ustawiony zgodnie z wymaganiami do czynności, którą wykonuje?)</h4>
                            <input type="radio" id="id_option9_1" value="TAK" name="question9">
                            <label for="id_option9_1">TAK</label>
                            <input type="radio" id="id_option9_2" value="NIE" name="question9">
                            <label for="id_option9_2">NIE</label>
                            <input type="text" name="answer9" id="id_answer9" placeholder="Uzasadnienie odpowiedzi">
                            <hr>      

                            <h4>  Czy materiał wykorzystywany do wykonywanej czynności jest zgodny z wydaniem? 
                                (Sprawdzić czy wydana partia materiału jest do tego zlecenia/uruchomienia)</h4>
                            <input type="radio" id="id_option10_1" value="TAK" name="question10">
                            <label for="id_option10_1">TAK</label>
                            <input type="radio" id="id_option10_2" value="NIE" name="question10">
                            <label for="id_option10_2">NIE</label>
                            <input type="text" name="answer10" id="id_answer10" placeholder="Uzasadnienie odpowiedzi">
                            <hr>   
                            
                            <input type="text" name="n_uwagi_koncowe" id="id_uwagi_koncowe" placeholder="Uwagi końcowe">
                            <br><hr><hr>
                            <input type="submit" value="Wyślij" class="przycisk1">



                            <br>
                            <br>

                    </form>


                </div>
        </div>
        <footer>
            <script src="coockiePermision.js"></script>
        </footer>
    </section>
    
</body>
</html>
