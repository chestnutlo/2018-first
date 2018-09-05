<?php 
$tree=array('樹','小樹','大樹','中樹','XL樹','XXL樹','Small樹','mid樹','large樹',);
$tree2=array(1=>'樹',2=>'小樹',3=>'大樹',4=>'中樹',5=>'XL樹',6=>'XXL樹',1=>'Small樹',1=>'mid樹',1=>'large樹',);

echo $tree[3].'<br>';

print_r($tree).'<br>';

list ($a,$b)=$tree;
echo $a.'<br>';
echo $b.'<br>';

for ($i=0; $i<  count($tree);$i++){
    echo $tree[$i].'<br>';
}
 
// echo end($tree);


// print_r($tree2);


// echo is_array($tree);



?>