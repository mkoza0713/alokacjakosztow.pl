<?php
session_start();
$number_of =  $_POST['stopWatch_last_name'];

$fileName='data.xls';
$fp = fopen($fileName, 'w');

for($i=1; $i<=$number_of; $i++){
    $index_number_of_1 = $i.'_cell1';
    $index_number_of_2 = $i.'_cell2';
    $index_number_of_3 = $i.'_cell3';

    $wiersz_Zapytania_1 = $i."\t".
            $_POST[$index_number_of_1]."\t".
            $_POST[$index_number_of_2]."\t".
            $_POST[$index_number_of_3]."\n";
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
?>