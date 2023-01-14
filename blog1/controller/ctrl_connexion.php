<?php
    $message ="";
    include './model/utilisateur.php';
    include './view/view_header.php';
    include './view/view_navbar.php';
    include './view/view_connexion.php';
    //test si le bouton cliqué
    if(isset($_POST['submit'])){
        //test si les champs sont remplis
        if(!empty($_POST['mail_util']) AND  !empty($_POST['password_util'])){
            //stocker les valeurs et les nettoyer
            $mail = cleanInput($_POST['mail_util']);
            $password = cleanInput($_POST['password_util']);
            //récupérer si l'utilisateur existe
            $exist = showUserByMail($bdd, $mail);
            //tester si l'utilisateur existe
            if(!empty($exist)){
                //stocker le hash du mot de passe (depuis la bdd)
                $hash = $exist[0]['password_util'];
                //tester si le mot de passe correspond
                if(password_verify($password, $hash)){
                    //stocker les informations dans session
                    $_SESSION['connected'] = true;
                    $_SESSION['mail'] = $exist[0]['mail_util'];
                    $_SESSION['nom'] = $exist[0]['nom_util'];
                    $_SESSION['prenom'] = $exist[0]['prenom_util'];
                    $_SESSION['img'] = $exist[0]['img_util'];
                    //redirection vers ./connexion
                    header('Location: ./connexion');
                }
                //test si le mot de passe n'est pas correct
                else{
                    $message = "Les informations ne sont pas valides";
                }
            }
            //test si l'utilisateur n'existe pas
            else{
                $message = "Les informations ne sont pas valides";
            }
        }
    }
    //test si l'utilisateur
    else{
        $message = "Pour se connecter cliquez sur connexion";
    }
    echo $message;
    include './view/view_footer.php';
?>