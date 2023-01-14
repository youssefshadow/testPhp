<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    function createUser($bdd,$nom, $prenom, $mail, $password){
        try {
            $req = $bdd->query("INSERT INTO utilisateur(nom_util, prenom_util, mail_util,
             password_util)VALUES('$nom', '$prenom', '$mail', '$password')");
        } 
        catch (Exception $e) 
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
    function createUserV2($bdd,$nom, $prenom, $mail, $password){
        try {
            $req = $bdd->prepare("INSERT INTO utilisateur(nom_util, prenom_util, mail_util,
            password_util)VALUES(:nom, :prenom, :mail, :pwd)");
            $req->execute([
                'nom'=> $nom,
                'prenom'=> $prenom,
                'mail'=> $mail,
                'pwd'=> $password
                ]);
        } 
        catch (Exception $e) 
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
    function createUserV3($bdd,$nom, $prenom, $mail, $password, $img, $validate){
        try {
            $req = $bdd->prepare("INSERT INTO utilisateur(nom_util, prenom_util, mail_util,
            password_util, img_util, validate_util)VALUES(?, ?, ?, ?, ?, ?)");
            $req->bindParam(1, $nom, PDO::PARAM_STR);
            $req->bindParam(2, $prenom, PDO::PARAM_STR);
            $req->bindParam(3, $mail, PDO::PARAM_STR);
            $req->bindParam(4, $password, PDO::PARAM_STR);
            $req->bindParam(5, $img, PDO::PARAM_STR);
            $req->bindParam(6, $validate, PDO::PARAM_INT);
            $req->execute();
        } 
        catch (Exception $e) 
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
    //fonction qui retourne un tableau associatif d'un utilisateur null (ex :?string)
    function showUserByMail($bdd, $mail):?array{
        try {
            //stocker et évaluer la requête
            $req = $bdd->prepare("SELECT id_util, nom_util, prenom_util,
            mail_util, password_util, img_util FROM utilisateur WHERE mail_util = ?");
            //binder la valeur $mail au ?
            $req->bindParam(1, $mail, PDO::PARAM_STR);
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
    //fonction qui retourne un tableau associatif d'un utilisateur null (ex :?string)
    function activeUserByMail($bdd, $mail):void{
        try {
            //stocker et évaluer la requête
            $req = $bdd->prepare("UPDATE utilisateur SET validate_util =1 
            WHERE mail_util = ?");
            //binder la valeur $mail au ?
            $req->bindParam(1, $mail, PDO::PARAM_STR);
            //exécuter la requête
            $req->execute();
        } 
        catch (Exception $e) 
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
    function sendMail(?string $userMail, ?string $subject, ?string $emailMessage,
        ?string $login_smtp, ?string $mdp_smtp){
            require './vendor/autoload.php';
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->SMTPDebug = 0; 
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
                $mail->isSMTP();                                            
                $mail->Host       = 'smtp.office365.com';                     
                $mail->SMTPAuth   = true;                                  
                $mail->Username   = $login_smtp;                     
                $mail->Password   = $mdp_smtp;                               
                $mail->SMTPSecure = 'tls';            
                $mail->Port       = 587;                                    
                //Recipients
                $mail->setFrom($login_smtp, 'Blog Admin');
                $mail->addAddress($userMail);     
                $mail->isHTML(true);                                 
                $mail->Subject = $subject;
                $mail->Body    = $emailMessage;
                $mail->send();
                echo 'Message has been sent';
            } 
            catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
?>