<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <p><input type="text" name="nom"></p>
        <p><input type="text" name="prenom"></p>
        <p><input type="submit" value="ajouter" name="submit"></p>
        
    </form>
    
</body>
</html>
<?php
//tester si le button à été cliqué
if(isset($_GET['submit'])){
    if ($_GET['nom']!= "" AND $_GET['prenom'] != "") {
        echo '<p>le compte '.$_GET['prenom'].' a été ajouté</p>';
        
    }else{
        echo '<p>veuillez remplir les champs</p>';
    }

}
//Test boutton non cliqué
else{
    echo '<p>Pour ajouter un utilisateur cliquer sur le bouton ajouter </p>';
}

?>