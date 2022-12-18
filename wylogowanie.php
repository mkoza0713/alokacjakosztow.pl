<?php
session_start();
session_unset();  //koniec sesji..

header('Location: index.php');

?>