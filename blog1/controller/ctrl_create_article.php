<?php
    $namePage = "Create Article";
    $message = "";
    //import des ressources
    include './model/article.php';
    include './model/categorie.php';
    include './view/view_header.php';
    include './view/view_navbar.php';
    include './view/view_create_article.php';
    //construire la liste déroulante
    $liste = getAllCategory($bdd);
    //compteur pour liste
    $cpt= 0;
    //boucle pour parcourir la liste
    foreach($liste as $value){
        //if($value['nom_cat']== 'sport') version avec le nom de la catégorie
        //test si compteur <1 (ajout de selected)
        if($cpt <1){
            //construction des options de la liste
            echo '<option value = '.$value['id_cat'].' selected>'.$value['nom_cat'].'</option>';
            $cpt++;
        }
        //sinon on affiche l'option sans selected
        else{
             //construction des options de la liste
            echo '<option value = '.$value['id_cat'].'>'.$value['nom_cat'].'</option>';
        } 
    }
    //afficher la fin du formulaire
    echo '</select></p>
        <p>Saisir date l\'article</p>
        <p><input type="date" name="date_art"></p>
        <input type="file" name="img_art">
        <p><input type="submit" value="ajouter" name="submit"></p>
        </form>';  
    
    //test 
    //test si le bouton est cliqué
    if(isset($_POST['submit'])){
        //test si les champs input sont remplis
        if(!empty($_POST['nom_art']) AND !empty($_POST['contenu_art']) AND
        !empty($_POST['date_art']) AND !empty($_POST['id_cat'])){
            //stocker les valeurs POST dans des variables
            $nomArticle = cleanInput($_POST['nom_art']);
            $contenuArticle = cleanInput($_POST['contenu_art']);
            $dateArticle = cleanInput($_POST['date_art']);
            $idCat = cleanInput($_POST['id_cat']);
            $exist = getAllArticleByValue($bdd, $nomArticle, $dateArticle);
            //test si l'article n'existe pas (doublon)
            if(empty($exist)){
                //test si on à une image
                if(isset($_FILES['img_art']) AND $_FILES['img_art']['name'] !=""){
                    //stockage des valeurs du fichier importé
                    $name = $_FILES['img_art']['name'];
                    $tmpName = $_FILES['img_art']['tmp_name'];
                    $size = $_FILES['img_art']['size'];
                    $error = $_FILES['img_art']['error'];
                    $ext = get_file_extension($_FILES['img_art']['name']);
                    //test de la taille si plus grand que 5 Mo (5*1024*1024 octes)
                    if($size>5*1024*1024){
                        $message = "le fichier est trop grand taille max 5Mo";
                    }
                    //test si il à la bonne taille
                    else{
                        //test si le format est bon (jpg, jpeg)
                        if(strtolower($ext)=='jpg' OR strtolower($ext)=='jpeg' OR strtolower($ext)=='png'){
                            $img = './asset/image/'.$nomArticle.$dateArticle.'.'.$ext;
                            //appeler la fonction pour déplacer et renommer un fichier
                            move_uploaded_file($tmpName, $img);
                        }
                        //test sinon le format n'est pas bon
                        else{
                            $message = "le fichier n'est pas au bon format";
                        }
                    }
                }
                //test si on n'a pas d'image (image par défaut)
                else{
                    $img = './asset/image/defaut.png';
                }
                createArticle($bdd,$nomArticle, $contenuArticle, $dateArticle, $idCat, $img);
                //message de confirmation
                $message = "l'article : $nomArticle à été ajouté en BDD";
            }
            else{
                $message = "Article : $nomArticle existe déja veuillez le renommer";
            }
        }
        //test si un ou plusieurs champs ne sont pas remplis
        else{
            $message = "Veuillez remplir les champs du formulaire";
        }
    }
    //test si le bouton n'est pas cliqué
    else{
        $message = "Pour ajouter un article veuillez cliquer sur ajouter";
    }
    //affichage des erreurs
    echo $message;
    include './view/view_footer.php';
?>