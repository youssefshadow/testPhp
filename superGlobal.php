<?php

//une fonction qui va retourner la moyenne d'un tableau :
$tab = [0, 5, 12, 15];
$tab1=[12,654,78,99];
//pour connaitre la taille du tableau 

//ou
count($tab);
$moyenne= '';
function moyen($tab){
    $nbrColonne = count($tab);
    $valeur=0;
    foreach($tab as $value){
        $valeur+=$value;
      
    }
    $moyenne=$valeur/$nbrColonne;
    echo $moyenne;
}
moyen($tab);

moyen($tab1);
?>
 
