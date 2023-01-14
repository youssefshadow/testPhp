<?php
    //test si l'utilisateur est connecté
    if(isset($_SESSION['connected'])){
        $namePage = "ajouter une categorie";
        $message = "";
            //import des ressources
        include './model/categorie.php';
        include './view/view_header.php';
        include './view/view_navbar.php';
        include './view/view_create_category.php';

        //test si le bouton submit est cliqué 
        if(isset($_POST['submit'])){
            //test si le champ input nom_cat est rempli
            if(!empty($_POST['nom_cat'])){
                //stocker la valeur $_POST['nom_cat'] et nettoyer le code
                $nom = cleanInput($_POST['nom_cat']);
                //stocker le resultat de la requête (cherche si elle existe)
                $exist = getCatByName($bdd, $nom);
                //tester si doublon (n'existe pas)
                if(empty($exist)){
                    //ajouter la catégorie en BDD
                    createCategory($bdd, $nom);
                    $message = 'La catgeorie '.$nom.' a été ajouté en BDD';
                }
                //test existe déja
                else{
                    $message = 'la catégorie '.$nom.' existe déja';
                }
            }
            //si le champ est vide
            else{
                $message = "Veuillez remplir le champ nom";
            }
        }
        //test quand on lance la page
        else{
            $message = "Pour ajouter une category cliquer sur ajouter";
        }
        //affichage du messsage
        echo $message;
        //import du footer
        include './view/view_footer.php';
    }
    //si non connecté
    else{
        header('Location: ./');
    }
?>