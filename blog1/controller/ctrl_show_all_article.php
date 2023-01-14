<?php
    $namePage = "show all article";
    //import des ressources
    include './model/article.php';
    include './view/view_header.php';
    include './view/view_navbar.php';
    include './view/view_all_article.php';
    //logique de la page
    //stocker la liste des articles dans un tableau
    
    //test si le bouton est cliqué
    if(isset($_POST['submit'])){
        $liste2 = getAllArticleByFilter($bdd, $_POST['filter']);
        //test si la liste est vide (si il n'y a aucun article)
        if(empty($liste2)){
            echo "<p>Il n'y à aucun article</p>"; 
        }
        //test si il existe des articles dans la table
        else{
            foreach($liste2 as $value){
            //affichage de chaque ligne du tableau
            echo '<p>'.$value['id_art'].' '.$value['nom_art'].' 
            '.$value['contenu_art'].' '.$value['date_art'].'</p>'; 
            }
        }
    }
    //exécuter au chargement de la page
    else{
        $liste = getAllArticle($bdd);
        //test si la liste est vide (si il n'y a aucun article)
        if(empty($liste)){
            echo "<p>Il n'y à aucun article</p>";
            //redirection vers une page
            //header('Location: ./createArticle.php');
        }
        //test si il existe des articles dans la table
        else{
            //parcourir le tableau ($liste)
            foreach($liste as $value){
                //affichage de chaque ligne du tableau
                echo '<p>'.$value['id_art'].' '.$value['nom_art'].' 
                '.$value['contenu_art'].' '.$value['date_art'].'</p>'; 
            }
        }
        
    }
    include './view/view_footer.php';
?>