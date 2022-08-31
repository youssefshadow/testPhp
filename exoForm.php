<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Calcul TVA</h3>
    <form action="" method="post">
        <p><input type="number" name="prixHt" id=""></p>
        <p><input type="number" name="nombre" id=""></p>
        <p><input type="text" name="taux" id=""></p>
        <p><input type="submit" value="calculer" name="submit"></p>
    </form>
    
</body>
</html>
<?php
$prixTtc=0;
if(isset($_POST['submit'])){
    $prixTtc=$_POST['prixHt']*$_POST['taux']*$_POST['nombre'];
    echo '<p>Le prix TTC est egal à '.$prixTtc.' €</p>';
}
?>