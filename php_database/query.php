<?php
//require('../connection/connection.php');
require_once('../connection/connection.php');//使用方法跟require、include一樣，差別在於在引入檔案前，會先檢查檔案是否已經在其他地方被引入過了，若有，就不會再重複引入。

$query = $db->query('SELECT * FROM news');
$data = $query->fetchAll(PDO::FETCH_ASSOC);
print_r($data);
?>
