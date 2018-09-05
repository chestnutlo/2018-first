<?php 


$b = 10;
$a = 100;
$ab= 500;
$link = "我一定要學會PHP！聽說有人看了TwHappy就學會了！";

echo $ab >= $a+$b;
echo '<br>';
echo $a/$b;                         
echo '<br>';
echo $b-1;
echo '<br>';

echo "我一定要學會PHP！聽說有人看了TwHappy就學會了！" ; 
echo '<br>';
echo  "<a href='http://www.twhappy.com/index.php?action=show&no=103'>$link</a>";
echo '<br>'; 

$a=8; 

while($a<=10){ 

  echo $a."<br>"; 

  $a++;  //$a=$a+1;的縮寫 
} 


echo '<table border="1" width=100%>
<tr>';

for($i=1;$i<=100;$i++){

echo "<td>富士山蘋果".$i."顆</td>";
// if($i>65)break;
if($i % 5 == 0 ){
    echo "</tr><tr>";
    }
}

echo '</table>';


// $y=0; 
// while($y<=10){ 
//   echo $y."<br>"; 
//   $y++;  //$a=$a+1;的縮寫 
//  $y

// }



for($i=1 ;$i<=100;$i++){
   echo ($i).'<br>';

  if($i % 19 == 0 ){
      echo "無";
      }
  }





?> 