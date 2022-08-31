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
    //function
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
    //tableau indéxé:
    //methode 1
    $tab=[];
    //methode 2
    $tab2=array();
    $tab[0]='mathieu';
    $tab2[0]='adrar';
    $tab2[1]='test';
    echo $tab[0];
    echo $tab2[0];
    //tableau assotiatif:
    $tab3=['nom'=>'Baro' ,'prenom','age'];
    $tab3['prenom']='Mathieu';
    $tab3['age']=38;
    $tab3['telephone']='06201245795';
    echo $tab3['nom'];
    echo $tab3['age'];
    echo $tab3['telephone'];
    //pour afficher le tableau :
    var_dump($tab3);

    // foreach($tab2 as $value){
    //     echo $value;
    // }
    foreach($tab3 as $key =>$value){
        echo 'Le '.$key.' : '.$value.'<br>';
    }

?>

<?php
    $tabX=[5,11,8,22,36,42,3,78,1,29];
    function maxValue($tabX){
        $max=0;
        foreach ($tabX as $value) {
            if ($value>$max) {
            $max=$value;
            }
            else{
                $max=$max;
            }
            
        }
        return $max;
    }
    echo maxValue($tabX);

?>

<?php
    //une fonction qui va retourner la moyenne d'un tableau :
    $tablo = [0, 5, 12, 15];
    //pour connaitre la taille du tableau 
    $nbrColonne = count($tab);
    //ou
    count($tab);
    function moyen($tab){
        foreach($tab as $value){
            $moyenne=0;
            $value+=$value;
            $moyenne=$value/count($tab);
            echo $moyenne;
            
        }
    }
    moyen($tablo);
 
 ?>
