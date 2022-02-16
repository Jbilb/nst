<?php

session_start();

// ========================================================
// Création de l'autoload pour les classes à utiliser
// ========================================================

function chargerClasses($classname) 
{
    require(realpath(__DIR__ . '/..').'/models/'.$classname.'.php');
}

spl_autoload_register('chargerClasses');

// ========================================================
// Connexion à la base de données
// ======================================================== 

include_once realpath(__DIR__ . '/..').'/includes/inc_config.php';

$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4', DB_USER, DB_PASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
 
//**************************************************   
// AJOUT D'UN COMMENTAIRE
//**************************************************

$form_tools = new FormTools();
$CommentaireManager = new CommentaireManager($db);
$UserManager = new UserManager($db);
$ArticleManager = new ArticleManager($db);
$SiteManager = new SiteManager($db);

$form_data = $form_tools->check_form_fields($_POST);
if($form_data && isset($form_data['consentement'])) 
{
    
    // *** Création du commentaire
    $commentaire = new Commentaire($form_data);
    
    // *** Ajout de la date du jour
    $commentaire->setDate_publication(date('d-m-Y'));
    
    // *** Initialisation du statut à 0 (non publié)
    $commentaire->setIs_active(0);
   
    $CommentaireManager->create($commentaire);
        
    // *** Envoi du mail de notification
    $article = $ArticleManager->get($commentaire->id_article());
    $user = $UserManager->get($article->id_user());
    $site = $SiteManager->get(1);

    // INITIALISATION DE PHP MAILER
    require '../form/phpmailer/PHPMailer.php';
    require '../form/phpmailer/Exception.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    try {
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('no-reply@'.$site->domain(), $site->name());
        //$mail->addAddress('contact@example.com', 'Example Name'); Send mail to
        //$mail->AddCC('contact@example.com', 'Example Name'); Add copie to
        //$mail->AddBCC('contact@example.com', 'Example Name');  Add hiddden copie to
        //$mail->AddReplyTo('contact@example.com', 'Example Name'); Add reply to
        $mail->addAddress($user->email(), $user->firstname().' '.$user->lastname());
        $mail->Subject = $site->name().' | Nouveau commentaire';
        $mail->isHTML(true);
        $mailmsg  = "<h4>Nouveau commentaire déposé sur l'un de vos articles :</h4>";
        $mailmsg .= "<strong>Titre de l'article :</strong> ".$article->title()." <br>";
        $mailmsg .= "<strong>Date du commentaire :</strong> ".$commentaire->date_publication()." <br>";
        $mailmsg .= "<strong>Nom / pseudo :</strong> ".$commentaire->name()." <br>";
        $mailmsg .= "<strong>Email :</strong> ".$commentaire->email()." <br><br>";
        $mailmsg .= "<strong>Contenu du commentaire :</strong> ".$commentaire->content()." <br><br>";
        $mailmsg .= "<strong>Pour valider / supprimer ce commentaire, connectez-vous à votre espace d'administration : </strong> <a href='".SITE_ADMIN_BASE."'>".SITE_ADMIN_BASE."</a> <br><br>";
        $mailmsg .= "<strong>Données personnelles :</strong> Cette personne accepte que les informations personnelles saisies dans ce formulaire puissent être exploitées par ".$site->name().", afin de pouvoir la recontacter si nécessaire. Elles ne doivent en aucun cas être transmises à des organismes tiers.<br>";
        $mailmsg .= "<hr><small><em>Ce message provient du <b>formulaire d'ajout de commentaire</b> de votre site <b>".$site->url()."</b></em></small>";
        $mail->Body = $mailmsg;
        $mail->send();
        echo 'Message envoyé avec succès.';
    } catch (Exception $e) {
        header('HTTP/1.1 403 Forbidden');
        print 'Le message n\'a pas pu être envoyé. <br>';
        print 'Erreur : ' . $mail->ErrorInfo;
    }
    return true;
} 
else 
{
    header('HTTP/1.1 403 Forbidden');
    return false;
}




function parse($data) {
  $data = trim($data);
  $data = stripslashes($data);
  
  return $data;
}

function test_email($data) {
  $data = trim($data);
  $data = stripslashes($data);
  filter_var($data, FILTER_SANITIZE_EMAIL);
  return $data;
}

?>