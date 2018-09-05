<?php 
session_start();
require_once('../connection/connection.php');

$sql= "SELECT * FROM  members  WHERE   account=:account AND password=:password ";

$sth = $db ->prepare($sql);
$sth ->bindParam(":account", $_POST['account'], PDO::PARAM_STR);
$sth ->bindParam(":password", $_POST['password'], PDO::PARAM_INT);
$sth ->execute();
$member = $sth->fetch(PDO::FETCH_ASSOC);

$_SESSION['member'] = $member ;

if(isset($_SESSION['member']) && $_SESSION['member']  !=null ){
    header('Location:customer_account.php');
}else{
    header('Location:login_error.php');
}

?>