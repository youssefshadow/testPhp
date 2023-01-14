<?php
$message ="";
    //import
    include './model/utilisateur.php';
    include './view/view_header.php';
    include './view/view_navbar.php';
    include './view/view_activate_user.php';
    //test du paramètre get 
    if(isset($_GET['mail']) AND $_GET['mail'] !=""){
        //stocker $_GET['mail'] dans une variable
        $mail = $_GET['mail'];
        //récupérer l'utilisateur par son mail
        $exist = showUserByMail($bdd, $mail);
        //tester si $exist est non vide
        if(!empty($exist)){
            activeUserByMail($bdd, $mail);
            $message = 'le compte à été activé';
        }
        else{
            $message = "les informations du compte sont invalides";
        }
    }
    else{
        $message = "Aucun paramètre";
    }
    echo $message;
?>