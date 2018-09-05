<?php
session_start();

$index = $_GET['car'];
unset($_SESSION['List'][$index]);

$_SESSION['List'] = array_values($_SESSION['List']);

header('Location:../basket.php?Del=ture');

?>
