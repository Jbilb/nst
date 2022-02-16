<?php

// *** Instanciation de la classe
$CategorieManager = new CategorieManager($db);

//***********************************************
// Afficher la liste des categories
//***********************************************

function categories_list(CategorieManager $manager, Tools $tools) 
{
    // Si l'utilisateur n'est pas admin, on le renvoit sur la home
    if ($_SESSION['user']->role() !== 0) 
    {
         $tools->redirect('?msgsystem=warning_restricted');
    }
    else
    {
        $categories_list = $manager->lists();
        include (realpath(__DIR__ . '/..') . '/view/CategoriesListView.php');
    }
}

//***********************************************
// Nouveau categorie
//***********************************************

function new_categorie() 
{
    // Tentative de récupération de la session temporaire, si existante
    if(!empty($_SESSION['temp_data']))
    {
        $categorie = new Categorie($_SESSION['temp_data']);
    }
    // Sinon, création de l'objet vide
    else
    {
        $categorie = new Categorie([]);
    }
    
    // Définition des actions
    $action = "create/";
    $title = "Création d'une nouvelle catégorie";
    
    // Inclusion de la vue
    include (realpath(__DIR__ . '/..') . '/view/CategoriesEditView.php');
}

//***********************************************
// Edition d'un categorie
//***********************************************

function edit_categorie(CategorieManager $manager, Tools $tools)
{
    // Récupération de l'ID et vérification de l'existence dans la base de données
    if(!empty($_GET['id']) && $manager->exists($_GET['id']))
    {
        $id = $_GET['id'];
        $categorie = $manager->get($id);
        
        if(!empty($_SESSION['temp_data']))
        {
            $categorie = new Categorie($_SESSION['temp_data']);
        }
        
        // Création des variables utiles
        $action = "update/".$id;
        $title = "Edition d'une categorie";
        $_SESSION['edit_categorie'] = $id;
    
        // Inclusion de la vue
        include (realpath(__DIR__ . '/..') . '/view/CategoriesEditView.php');
    }
    else
    {
        $tools->redirect('categories/?msgsystem=error_unknown');
    }
}

//***********************************************
// Création / update dans la base de données
//***********************************************

function update_categorie(CategorieManager $manager, Tools $tools, FormTools $form_tools, $creation) 
{
    // Création de l'URL de redirection en cas d'erreur
    if($creation)
    {
        $url_redirect = 'categories/new';
    }
    else 
    {
        $url_redirect = 'categories/edit/'.$_GET['id'];
    }
    

    // On vérifie que le format des données correspond à ce qui est attendu
    $form_data = $form_tools->check_form_fields($_POST);
    
    if($form_data)
    {   
        // Création du Categorie à insérer en base de données
        $new_categorie = new Categorie($form_data);
        $new_categorie->setSlug($tools->createSlug($new_categorie->name()));
        
        // Case : création d'un nouvel categorie
        if($creation)
        {
            // Création du categorie en BDD et renvoi vers la page de succès
            $creation = $manager->create($new_categorie);

            // Si la création réussi
            if($creation)
            {
                $tools->redirect('categories/?msgsystem=success_create');
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
                !empty($_SESSION['edit_categorie']) && 
                $_SESSION['edit_categorie'] === $_GET['id'] && 
                $manager->exists($_GET['id'])
            )
            {
                // Stockage de l'ID transmis et destruction de la session
                $id = $_GET['id'];
                unset($_SESSION['edit_categorie']);

                $new_categorie->setId_categorie($id);
                
                // Update en base de données et redirection vers la page de succès
                $update = $manager->update($new_categorie);

                // Si l'update a réussi
                if($update)
                {
                    $tools->redirect('categories/?msgsystem=success_update');
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

function delete_categorie(CategorieManager $manager, Tools $tools) 
{
    // Récupération de l'ID et vérification de l'existence dans la base de données
    if(!empty($_GET['id']) && $manager->exists($_GET['id']))
    {
        if($manager->usedInArticle($_GET['id'])) 
        {
            // Si la categorie est utilisé dans un article, on empêche sa suppression
            $tools->redirect('categories/?msgsystem=error_used');
        }
        else
        {
            $manager->delete($_GET['id']);
            $tools->redirect('categories/?msgsystem=success_delete');
        }
    }
    else
    {
        $tools->redirect('categories/?msgsystem=error_unknown');
    }
}

?>