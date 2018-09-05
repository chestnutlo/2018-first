<?php
require_once('../../connection/connection.php');
$sql = "DELETE FROM products WHERE products_id=".$_GET['products_id'];
$sth = $db->prepare($sql);
$sth->execute();
header('Location:list.php?product_categories_id='.$_GET['product_categories_id']);
 ?>
