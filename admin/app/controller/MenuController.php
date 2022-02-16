<?php

// INIT CLASS

$MenuManager = new MenuManager($db);
$CategorieMenuManager = new CategorieMenuManager($db);

//***********************************************
// Edition du menu
//***********************************************

function edit_menu(MenuManager $manager, CategorieMenuManager $CategorieMenuManager, Tools $tools)
{
    // Récupération de l'ID et vérification de l'existence dans la base de données
    if($manager->exists(1))
    {
        // $id = $_GET['id'];
        $id = 1;
        $menu = $manager->get($id);
        
        // Tentative de récupération de la session temporaire, si existante
        if(!empty($_SESSION['temp_data']))
        {
            $menu = new Menu($_SESSION['temp_data']);
        }
        
        // Création des variables utiles
        $action = "update/".$id;
        $title = "Edition du menu";
        $_SESSION['edit_menu'] = $id;

        // Récupération des catégories (sans les sous-catégories)
        $list = $CategorieMenuManager->lists();
        $list_categories_menu = [];
        foreach($list as $categorie_menu) 
        {
            if ($categorie_menu->is_sous_categorie() != 1) {
                $list_categories_menu[] = $categorie_menu; 
            }
        }

        // Récupération des catégories insérées dans le menu
        
        $list_name_categories_menu = [];
        foreach($list_categories_menu as $categorie_menu) 
        {
            $list_name_categories_menu[$categorie_menu->id_categorie_menu()] = $categorie_menu->name(); 
        }

        // Création et build du corps de la page
        $menu_body = $menu->create_menu();
        ksort($menu_body);
        
        // Inclusion de la vue
        include (realpath(__DIR__ . '/..') . '/view/MenuEditView.php');
    }
    else
    {
        $tools->redirect('menu/?msgsystem=error_unknown');
    }
}

//***********************************************
// Création / update dans la base de données
//***********************************************

function update_menu(MenuManager $manager, Tools $tools, FormTools $form_tools, $creation) 
{
    // Création de l'URL de redirection en cas d'erreur
    if($creation)
    {
        $url_redirect = 'menu/new';
    }
    else 
    {
        $url_redirect = 'menu/edit/'.$_GET['id'];
    }
    
    
    $form_data = $form_tools->check_form_fields($_POST);
    
    if($form_data)
    {   
        // Création de l'objet Menu
        $new_menu = new Menu($form_data);
        
  
        // Case : création d'un nouveau menu
        if($creation)
        {   
            // Création du domaine du menu en BDD et renvoi vers la page de succès
            $manager->create($new_menu);
            
            $tools->redirect('menu/?msgsystem=success_create');
        }

        // Case : update du menu existante
        else
        {
            // On vérifie que l'ID transmis est correct et que le menu existe
            if(
                !empty($_SESSION['edit_menu']) && 
                $manager->exists($_GET['id'])
            )
            {
                // Stockage de l'ID transmis et destruction de la session
                $id = $_GET['id'];
                unset($_SESSION['edit_menu']);

                $new_menu->setId_menu($id);

                // Update en base de données et redirection vers la page de succès
                $manager->update($new_menu);
                $tools->redirect('menu/?msgsystem=success_update');
            }
        }
    }
    else 
    {
        // Un ou plusieurs champ(s) ne correspond(ent) pas au(x) format(s) attendu(s)
        $tools->redirect($url_redirect.'?msgsystem=warning_error-format');
    }
}
?>