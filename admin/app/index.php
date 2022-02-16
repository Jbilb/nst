<?php 
// Include the Main Controller
include 'controller/MainController.php';
 
// Si l'utilisateur n'est pas logué, alors on le renvoie sur le formulaire d'authentification
if(empty($_SESSION['user']) && $pageName !== 'identification')
{
    $tools->redirect('identification/');
} 
else 
{
    // ========================================================
    // Routeur : Page Name
    // ========================================================
    
    switch($pageName)
    {
        // ========================================================
        // Gestion des tags
        // ========================================================
    
        case 'tags':
            include 'controller/TagsController.php';
            switch($actionName)
            {
                // Nouveau tag
                case 'new':
                    new_tag();
                break;
                    
                // Création d'un tag
                case 'create':
                    update_tag($TagManager, $tools, $form_tools, true);
                break;
                
                // Edition des infos d'un tag
                case 'edit':
                    edit_tag($TagManager, $tools);
                break;
                
                // Modification d'un tag
                case 'update':
                    update_tag($TagManager, $tools, $form_tools, false);
                break;
                
                // Suppression d'un tag
                case 'delete':
                    delete_tag($TagManager, $tools);
                break;
                    
                // Par défaut : affichage de la liste des tags
                default:
                    tags_list($TagManager);
            }
        break; 
            
        // ========================================================
        // Gestion des catégories
        // ========================================================
    
        case 'categories':
            include 'controller/CategoriesController.php';
            switch($actionName)
            {
                // Nouveau tag
                case 'new':
                    new_categorie();
                break;
                    
                // Création d'un tag
                case 'create':
                    update_categorie($CategorieManager, $tools, $form_tools, true);
                break;
                
                // Edition des infos d'un tag
                case 'edit':
                    edit_categorie($CategorieManager, $tools);
                break;
                
                // Modification d'un tag
                case 'update':
                    update_categorie($CategorieManager, $tools, $form_tools, false);
                break;
                
                // Suppression d'un tag
                case 'delete':
                    delete_categorie($CategorieManager, $tools);
                break;
                    
                // Par défaut : affichage de la liste des tags
                default:
                    categories_list($CategorieManager, $tools);
            }
        break;  
            
        // ========================================================
        // Gestion des articles
        // ========================================================
    
        case 'articles':
            include 'controller/ArticlesController.php';
            switch($actionName)
            {
                // Nouvel article
                case 'new':
                    new_article($TagManager, $CategorieManager);
                break;
                    
                // Création d'un article
                case 'create':
                    update_article($ArticleManager, $TagManager, $tools, $form_tools, true);
                break;
                
                // Edition d'un article
                case 'edit':
                    edit_article($ArticleManager, $CategorieManager, $TagManager, $tools);
                break;
                
                // Modification d'un article
                case 'update':
                    update_article($ArticleManager, $TagManager, $tools, $form_tools, false);
                break;
                
                // Suppression d'un article
                case 'delete':
                    delete_article($ArticleManager, $tools);
                break;
                    
                // Par défaut : affichage de la liste des articles
                default:
                    articles_list($ArticleManager,$CategorieManager);
            }
        break;    
            
        // ========================================================
        // Gestion des commentaires
        // ========================================================
    
        case 'commentaires':
            include 'controller/CommentairesController.php';
            switch($actionName)
            {       
                // Modération d'un commentaire
                case 'moderer':
                    edit_commentaire($CommentaireManager, $tools);
                break;
                
                // Modification d'un commentaire
                case 'update':
                    update_commentaire($CommentaireManager, $tools);
                break;
                
                // Suppression d'un commentaire
                case 'delete':
                    delete_commentaire($CommentaireManager, $tools);
                break;
                    
                // Par défaut : affichage de la liste des commentaires
                default:
                    commentaires_list($CommentaireManager, $tools);
            }
        break;   
            
        // ========================================================
        // Gestion du login
        // ========================================================
    
        case 'identification':
            include 'controller/LoginController.php';
            switch($actionName)
            {
                // Login d'un utilisateur 
                case 'login':
                    login($UserManager, $tools, $form_tools);
                break;
                    
                // Logout d'un utilisateur 
                case 'logout':
                    logout($UserManager, $tools);
                break;
                    
                // Par défaut : affichage du formulaire de login
                default:
                    identification($tools);
            }
        break; 
            
        // ========================================================
        // Gestion des options
        // ========================================================
    
        case 'settings':
            include 'controller/SettingsController.php';
            switch($actionName)
            {
                // Mise à jour de la configuration
                case 'edit':
                    edit_settings($tools, $form_tools, $siteManager);
                break;
                    
                // Par défaut : affichage de la liste des réglages de l'admin
                default:
                    settings_list();
            }
        break; 
            
        // ========================================================
        // Gestion des utilisateurs
        // ========================================================
    
        case 'users':
            include 'controller/UsersController.php';
            switch($actionName)
            {
                // Nouvel utilisateur
                case 'new':
                    new_user();
                break;
                    
                // Création d'un utilisateur
                case 'create':
                    update_user($UserManager, $tools, $form_tools, true);
                break;
                
                // Edition des infos d'un utilisateur
                case 'edit':
                    edit_user($UserManager, $tools);
                break;
                
                // Modification d'un utilisateur
                case 'update':
                    update_user($UserManager, $tools, $form_tools, false);
                break;
                
                // Suppression d'un utilisateur
                case 'delete':
                    delete_user($UserManager, $tools);
                break;
                    
                // Par défaut : affichage de la liste des utilisateurs
                default:
                    users_list($UserManager);
            }
        break;  
            
        // ========================================================
        // Default page : afficher la notice
        // ========================================================
    
        default:
            include 'view/NoticeView.php';
        break;


        /*** GESTION DU MENU ***/

        // ========================================================
        // Gestion des plats
        // ========================================================
    
        case 'plats':
            include 'controller/PlatsController.php';
            switch($actionName)
            {
                // Nouvel article
                case 'new':
                    new_plat();
                break;
                    
                // Création d'un plat
                case 'create':
                    update_plat($PlatManager, $tools, $form_tools, true);
                break;
                
                // Edition d'un plat
                case 'edit':
                    edit_plat($PlatManager, $tools);
                break;
                
                // Modification d'un plat
                case 'update':
                    update_plat($PlatManager, $tools, $form_tools, false);
                break;
                
                // Suppression d'un plat
                case 'delete':
                    delete_plat($PlatManager, $tools);
                break;
                    
                // Par défaut : affichage de la liste des plats
                default:
                    plats_list($PlatManager, $tools);
            }
        break;

        // ========================================================
        // Gestion des catégories de menu
        // ========================================================
    
        case 'categories-menu':
            include 'controller/CategoriesMenuController.php';
            switch($actionName)
            {
                // Nouvel article
                case 'new':
                    new_categorie_menu($PlatManager, $CategorieMenuManager);
                break;
                    
                // Création d'une catégorie
                case 'create':
                    update_categorie_menu($CategorieMenuManager, $tools, $form_tools, true);
                break;
                
                // Edition d'une catégorie
                case 'edit':
                    edit_categorie_menu($CategorieMenuManager, $PlatManager, $tools);
                break;
                
                // Modification d'une catégorie
                case 'update':
                    update_categorie_menu($CategorieMenuManager, $tools, $form_tools, false);
                break;
                
                // Suppression d'une catégorie
                case 'delete':
                    delete_categorie_menu($CategorieMenuManager, $tools);
                break;
                    
                // Par défaut : affichage de la liste des catégories de menu
                default:
                    categorie_menu_list($CategorieMenuManager, $tools);
            }
        break;

        // ========================================================
        // Gestion du menu
        // ========================================================
    
        case 'menu':
            include 'controller/MenuController.php';
            switch($actionName)
            {  
                // Edition du menu
                case 'edit':
                    edit_menu($MenuManager, $CategorieMenuManager, $tools);
                break;
                
                // Modification du menu
                case 'update':
                    update_menu($MenuManager, $tools, $form_tools, false);
                break;
                
                // Par défaut : affichage du menu
                default:
                    edit_menu($MenuManager, $CategorieMenuManager,$tools);
            }
        break;    
    }
}

?>