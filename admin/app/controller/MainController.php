<?php

//***********************************************
// System de gestion des notifications
//***********************************************
                
function get_helpers_pnotify_message_system(){
    
    if(isset($_GET['msgsystem'])){
        
        $msg = explode("_", $_GET['msgsystem']);
        $msg_type = $msg['0'];
        switch($msg_type){      
            case 'info':
                $type = 'info';
            break;
            case 'success':
                $type = 'success';
            break;
            case 'error':
                $type = 'error';
            break;
            case 'warning':
                $type = 'warning';
            break;
            default:
                $type = '';
            break;
        }
        switch($_GET['msgsystem']){      
            
            //####### ERROR MESSAGES #########
            case 'error_unknown':
                $title = 'ERREUR';
                $text = 'Élément inexistant !';
            break;
            case 'error_mustlogged':
                $title = 'ERREUR';
                $text = 'Vous devez vous connecter';
            break; 
            case 'error_existing':
                $title = 'OPÉRATION ANNULÉE';
                $text = 'Cet élément existe déjà, veuillez en saisir un nouveau !';
            break; 
            case 'error_used':
                $title = 'OPÉRATION ANNULÉE';
                $text = 'Cet élément que vous souhaitez supprimer est utilisé dans un article !';
            break; 
                
            //####### WARNING MESSAGES #########
            case 'warning_connexion':
                $title = 'Désolé !';
                $text = 'Le login ou le mot de passe renseigné est incorrect';
            break; 
            case 'warning_restricted':
                $title = 'ACCÈS REFUSÉ';
                $text = 'Désolé, votre statut ne vous autorise pas à accéder à cette catégorie';
            break; 
            case 'warning_error-format':
                $title = 'ERREUR';
                $text = 'Un ou plusieurs champ(s) contien(en)t des données qui ne correspondent pas au format attendu.';
            break; 
            case 'warning_missing-field':
                $title = 'ATTENTION';
                $text = 'Tous les champs du formulaire sont obligatoires !';
            break; 
            case 'warning_existing-element':
                $title = 'ATTENTION';
                $text = 'Cet élément existe déjà et ne peut pas être créé';
            break; 
                
            //####### SUCCESS MESSAGES #########   
            case 'success_logged':
                $title = 'Bienvenue';
                $text = 'Vous êtes désormais connecté !';
            break;     
            case 'success_create':
                $title = 'Parfait';
                $text = 'Elément créé avec succès !';
            break;
            case 'success_update':
                $title = 'Parfait';
                $text = 'Elément modifié avec succès !';
            break;
            case 'success_delete':
                $title = 'Parfait';
                $text = 'Elément supprimé avec succès !';
            break; 
                
            //####### INFO MESSAGES #########    
                
            case 'info_unlogged':
                $title = 'À bientôt';
                $text = 'Vous êtes désormais déconnecté !';
            break; 
            //####### DEFAULT #########   
            default:
                $title = 'Information';
                $text = '';
            break;
        }
    
        echo "<script>"."\n\t\t";
        echo "new PNotify({"."\n\t\t\t";
        echo "type: '".$type."',"."\n\t\t\t";
        echo "title: '".$title."',"."\n\t\t\t";
        echo "text: '".$text."'"."\n\t\t";
        echo " });"."\n\t";
        echo "</script>"."\n";
    }  
};

$addScriptDeclaration = '';

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

// ========================================================
// Démarrage de la session
// ======================================================== 

session_start();

// ========================================================
// On instancie les classes utilitaires
// ======================================================== 

$tools = new Tools();
$form_tools = new FormTools();

// ========================================================
// On récupère les paramètres utiles dans l'URL
// ======================================================== 

// Récupère le nom de page envoyé en GET via l'URL Rewriting
if(!empty($_GET['page'])) 
{
    $pageName = $_GET['page'];
} 
else 
{
    $pageName = '';
}

// Récupère l'action envoyée en GET via l'URL Rewriting
if(!empty($_GET['action'])) 
{
    $actionName = $_GET['action'];
} 
else 
{
    $actionName = '';
}

// ========================================================
// Récupération des options de l'admin
// ========================================================

$SiteManager = new SiteManager($db);
$site = $SiteManager->get(1);

// ========================================================
// Notification en cas de nouveaux commentaires
// ========================================================

$CommentsManager = new CommentaireManager($db);

if(!empty($_SESSION['user']))
{
    if($_SESSION['user']->role())
    {
        $new_com = $CommentsManager->is_new($_SESSION['user']->id_user());
    }
    else
    {
        $new_com = $CommentsManager->is_new(0);
    }
    
}

?>