<?php
    include './utils/bddConnect.php';
    include './utils/functions.php';
    
    //utilisation de session_start(pour gérer la connexion au serveur)
    session_start();

    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test soit l'url a une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';

    //routeur
    switch ($path) {
        case '/blog1/':
            include './home.php';
            break;
            case '/blog1/activate':
                include './controller/ctrl_activation.php';
                break;
        case '/blog1/connexion':
            include './controller/ctrl_connexion.php';
            break;
        case '/blog1/deconnexion':
            include './controller/ctrl_deconnexion.php';
            break;
        case '/blog1/showAllArticle':
            include './controller/ctrl_show_all_article.php';
            break;
        case '/blog1/createUser':
            include './controller/ctrl_create_user.php';
            break;
        case '/blog1/createArticle':
            include './controller/ctrl_create_article.php';
            break;
        case '/blog1/createArticleCode':
            include './controller/ctrl_create_article_code.php';
            break;
        case '/blog1/createCategory':
            include './controller/ctrl_create_category.php';
            break;
        default:
            include './error.php';
            break;
    }
?>