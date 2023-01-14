<?php
    //fonction qui retourne la liste des categories
    function getAllCategory($bdd):?array{
        try {
            //stocker et évaluer la requête
            $req = $bdd->prepare("SELECT id_cat, nom_cat FROM 
            categorie ORDER BY nom_cat ASC");
            //exécuter la requête
            $req->execute();
            //stocker dans $data le résultat de la requête (tableau associatif)
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            //retourner le tableau associatif
            return $data;
        } 
        catch (Exception $e) 
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
    //fonction qui ajoute une categorie
    function createCategory($bdd, $nomCat):void{
        try {
            //stocker et évaluer la requête
            $req = $bdd->prepare("INSERT INTO categorie(nom_cat)
            VALUE (?)");
            //bind les paramètres
            $req->bindParam(1, $nomCat, PDO::PARAM_STR);
            //exécuter la requête
            $req->execute();
        } 
        catch (Exception $e) 
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
    //fonction qui retourne un tableau associatif de categorie
    function getCatByName($bdd, $nomCat):?array{
        try {
            //stocker et évaluer la requête
            $req = $bdd->prepare("SELECT id_cat, nom_cat FROM categorie WHERE nom_cat = ?");
            //binder la valeur $mail au ?
            $req->bindParam(1, $nomCat, PDO::PARAM_STR);
            //exécuter la requête
            $req->execute();
            //stocker dans $data le résultat de la requête (tableau associatif)
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            //retourner le tableau associatif
            return $data;
        } 
        catch (Exception $e) 
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
?>