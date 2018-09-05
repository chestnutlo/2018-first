<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<table border="1px" width=100%>
<tr><?php for($i=1;$i<=100;$i++) { ?>
    <td>獅子跳呼拉圈<?php echo $i; ?> </td>
<?php   if($i % 3 == 0 ){
    echo "</tr><tr>";
    }

} ?>


<table border="1px" width=100%>
    <tr>
    <?php for($i=1;$i<=9;$i++) { 
        for($j=2;$j<=9;$j++){
        
    ?>
        <td><?php echo $i.'*'.$j.'='.$i*$j; ?></td>
        <?php } ?>
          </tr>
        <?php } ?>
  
</table>


<?php for ($k=0;$k<=10;$k++) { ?>
<p>今天天氣很好</p>
<?php   } ?>



</body>
</html>