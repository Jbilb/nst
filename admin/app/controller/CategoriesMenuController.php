<?php

// *** Instanciation de la classe
$CategorieMenuManager = new CategorieMenuManager($db);
$PlatManager = new PlatManager($db);

//***********************************************
// Afficher la liste des categories
//***********************************************

function categorie_menu_list(CategorieMenuManager $manager, Tools $tools) 
{
    // Si l'utilisateur n'est pas admin, on le renvoit sur la home
    if ($_SESSION['user']->role() !== 0) 
    {
         $tools->redirect('?msgsystem=warning_restricted');
    }
    else
    {
        $categories_menu_list = $manager->lists();
        include (realpath(__DIR__ . '/..') . '/view/CategoriesMenuListView.php');
    }
}

//***********************************************
// Nouveau categorie
//***********************************************

function new_categorie_menu(PlatManager $PlatManager, CategorieMenuManager $CategorieMenuManager) 
{
    // Tentative de récupération de la session temporaire, si existante
    if(!empty($_SESSION['temp_data']))
    {
        $categorie_menu = new CategorieMenu($_SESSION['temp_data']);
    }
    // Sinon, création de l'objet vide
    else
    {
        $categorie_menu = new CategorieMenu([]);
    }
    
    // Définition des actions
    $action = "create/";
    $title = "Création d'une nouvelle catégorie de menu";

    $list_plats = $PlatManager->lists();
    $list_categories = $CategorieMenuManager->lists();

    // Récupération des catégories insérées dans le menu
    $list_sous_categories = [];
    foreach($list_categories as $categorie) 
    {
        if ($categorie->is_sous_categorie() == 1) {
            $list_sous_categories[] = $categorie;
        }
    }

    //Récupération des sous-catégories
    $list_name_plats = [];
    foreach($list_plats as $plat) 
    {
        $list_name_plats[$plat->id_plat()] = $plat->title();
    }

    //Récupération du nom des sous-catégorie
    $list_name_sous_categories = [];
    foreach($list_sous_categories as $sous_categorie) 
    {
        $list_name_sous_categories[$sous_categorie->id_categorie_menu()] = $sous_categorie->name();
    }

    // Création et build du corps de la page
    $categorie_body = $categorie_menu->create_categorie();
    ksort($categorie_body);
    
    // Inclusion de la vue
    include (realpath(__DIR__ . '/..') . '/view/CategoriesMenuEditView.php');
}

//***********************************************
// Edition d'un categorie
//***********************************************

function edit_categorie_menu(CategorieMenuManager $manager, PlatManager $PlatManager, Tools $tools)
{
    // Récupération de l'ID et vérification de l'existence dans la base de données
    if(!empty($_GET['id']) && $manager->exists($_GET['id']))
    {
        $id = $_GET['id'];
        $categorie_menu = $manager->get($id);
        
        if(!empty($_SESSION['temp_data']))
        {
            $categorie_menu = new CategorieMenu($_SESSION['temp_data']);
        }
        
        // Création des variables utiles
        $action = "update/".$id;
        $title = "Edition d'une catégorie du menu";
        $_SESSION['edit_categories_menu'] = $id;

        $list_plats = $PlatManager->lists();
        $list_categories = $manager->lists();
    
        // Récupération des catégories insérées dans le menu
        $list_sous_categories = [];
        foreach($list_categories as $categorie) 
        {
            if ($categorie->is_sous_categorie() == 1) {
                $list_sous_categories[] = $categorie;
            }
        }
    
        //Récupération des sous-catégories
        $list_name_plats = [];
        foreach($list_plats as $plat) 
        {
            $list_name_plats[$plat->id_plat()] = $plat->title();
        }

        //Récupération du nom des sous-catégorie
        $list_name_sous_categories = [];
        foreach($list_sous_categories as $sous_categorie) 
        {
            $list_name_sous_categories[$sous_categorie->id_categorie_menu()] = $sous_categorie->name();
        }

        // Création et build du corps de la page
        $categorie_body = $categorie_menu->create_categorie();
        ksort($categorie_body);
    
        // Inclusion de la vue
        include (realpath(__DIR__ . '/..') . '/view/CategoriesMenuEditView.php');
    }
    else
    {
        $tools->redirect('categories-menu/?msgsystem=error_unknown');
    }
}

//***********************************************
// Création / update dans la base de données
//***********************************************

function update_categorie_menu(CategorieMenuManager $manager, Tools $tools, FormTools $form_tools, $creation) 
{
    // Création de l'URL de redirection en cas d'erreur
    if($creation)
    {
        $url_redirect = 'categories-menu/new';
    }
    else 
    {
        $url_redirect = 'categories-menu/edit/'.$_GET['id'];
    }
    

    // On vérifie que le format des données correspond à ce qui est attendu
    $form_data = $form_tools->check_form_fields($_POST);
    
    if($form_data)
    {   
        // Création du Categorie à insérer en base de données
        $new_categorie_menu = new CategorieMenu($form_data);
        if ($new_categorie_menu->sous_categories() != NULL) {
            $new_categorie_menu->setPlats(NULL);
        }
        
        // Case : création d'un nouvel categorie
        if($creation)
        {
            // Création du categorie en BDD et renvoi vers la page de succès
            $creation = $manager->create($new_categorie_menu);

            // Si la création réussi
            if($creation)
            {
                $tools->redirect('categories-menu/?msgsystem=success_create');
            }
            // Si la création échoue (doublon)
            else
            {
                $tools->redirect($url_redirect.'?msgsystem=warning_existing-element');
            }
        }

        // Case : update d'un categorie existant
        else
        {
            // On vérifie que l'ID transmis est correct et que le categorie existe
            if(
                !empty($_GET['id']) &&
                !empty($_SESSION['edit_categories_menu']) && 
                $_SESSION['edit_categories_menu'] === $_GET['id'] && 
                $manager->exists($_GET['id'])
            )
            {
                // Stockage de l'ID transmis et destruction de la session
                $id = $_GET['id'];
                unset($_SESSION['edit_categories_menu']);

                $new_categorie_menu->setId_categorie_menu($id);
                
                // Update en base de données et redirection vers la page de succès
                $update = $manager->update($new_categorie_menu);

                // Si l'update a réussi
                if($update)
                {
                    $tools->redirect('categories-menu/?msgsystem=success_update');
                }
                // Si l'update échoue (doublon)
                else
                {
                    $tools->redirect($url_redirect.'?msgsystem=warning_existing-element');
                }
            }
        }
    }
    else 
    {
        // Un ou plusieurs champ(s) ne correspond(ent) pas au(x) format(s) attendu(s)
        $tools->redirect($url_redirect.'?msgsystem=warning_error-format');
    }
}

//***********************************************
// Suppression d'un categorie
//***********************************************

function delete_categorie_menu(CategorieMenuManager $manager, Tools $tools) 
{
    // Récupération de l'ID et vérification de l'existence dans la base de données
    if(!empty($_GET['id']) && $manager->exists($_GET['id']))
    {
        $manager->delete($_GET['id']);
        $tools->redirect('categories-menu/?msgsystem=success_delete');
    }
    else
    {
        $tools->redirect('categories-menu/?msgsystem=error_unknown');
    }
}

?>