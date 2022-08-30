<?php
$nbr1=10;
$nbr2=13;
$nbr1=10;
$nbr2=50;
$nbr1=26;
$nbr1=$nbr2;

echo $nbr1.$nbr2;
echo 'nombre 1 : '.$nbr1.' , nombre 2 : '.$nbr2.'';

?>
<?php
$nbr1=10;
$nbr2=13;
if ($nbr1>$nbr2) {
    echo 'Les nombres 1 est plus grand ';
}
else if($nbr1==$nbr2){
    echo 'Les nombres 1 et 2 sont identiques ';
}
else{
    echo 'Le nombre 2 est plus grand <br> ';
}

?>
<?php
function retourner($num1,$num2,$num3):int{
    return $num1+$num2+$num3;
}
 echo retourner(10,20,30);
?>
<?php
function moyenne($num1,$num2,$num3):int{

   return ($num1+$num2+$num3)/3;
}
echo moyenne(10,20,30);