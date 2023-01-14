<?php
    //test si l'utilisateur est connecté
    if(isset($_SESSION['connected'])){
?>
    <body>
        <!--Menu navbar Connnecté -->
        <nav>
            <ul>
                <li><a href="./">Accueil</a></li>
                <li><a href="./showAllArticle">Afficher article</a></li>
                <li><a href="./createArticle">Ajouter article</a></li>
                <li><a href="./createArticleCode">Ajouter article code</a></li>
                <li><a href="./createCategory">Ajouter catégorie</a></li>
                <li><img class="userPic"src="<?php echo $_SESSION['img']?>"></li>
                <li><a href="./deconnexion">Déconnexion</a></li>
            </ul>
        </nav>
<?php
    }
    //test si l'utilisateur est déconnecté
    else{
?>
    <body>
        <!--Menu navbar Déconnecté-->
        <nav>
            <ul>
                <li><a href="./">Accueil</a></li>
                <li><a href="./showAllArticle">Afficher article</a></li>
                <li><a href="./createUser">Ajouter utilisateur</a></li>
                <li><a href="./connexion">Connexion</a></li>
            </ul>
        </nav>
<?php
    }
?>