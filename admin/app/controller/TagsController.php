<?php

// INIT CLASS

$TagManager = new TagManager($db);

//***********************************************
// Afficher la liste des tags
//***********************************************

function tags_list(TagManager $manager) 
{
    $tags_list = $manager->lists();
    include (realpath(__DIR__ . '/..') . '/view/TagsListView.php');
}

//***********************************************
// Nouveau tag
//***********************************************

function new_tag() 
{
    // Tentative de récupération de la session temporaire, si existante
    if(!empty($_SESSION['temp_data']))
    {
        $tag = new Tag($_SESSION['temp_data']);
    }
    // Sinon, création de l'objet vide
    else
    {
        $tag = new Tag([]);
    }
    
    // Définition des actions
    $action = "create/";
    $title = "Création d'un nouveau tag";
    
    // Inclusion de la vue
    include (realpath(__DIR__ . '/..') . '/view/TagsEditView.php');
}

//***********************************************
// Edition d'un tag
//***********************************************

function edit_tag(TagManager $manager, Tools $tools)
{
    // Récupération de l'ID et vérification de l'existence dans la base de données
    if(!empty($_GET['id']) && $manager->exists($_GET['id']))
    {
        $id = $_GET['id'];
        $tag = $manager->get($id);
        
        if(!empty($_SESSION['temp_data']))
        {
            $tag = new Tag($_SESSION['temp_data']);
        }
        
        // Création des variables utiles
        $action = "update/".$id;
        $title = "Edition d'un tag";
        $_SESSION['edit_tag'] = $id;
    
        // Inclusion de la vue
        include (realpath(__DIR__ . '/..') . '/view/TagsEditView.php');
    }
    else
    {
        $tools->redirect('tags/?msgsystem=error_unknown');
    }
}

//***********************************************
// Création / update dans la base de données
//***********************************************

function update_tag(TagManager $manager, Tools $tools, FormTools $form_tools, $creation) 
{
    // Création de l'URL de redirection en cas d'erreur
    if($creation)
    {
        $url_redirect = 'tags/new';
    }
    else 
    {
        $url_redirect = 'tags/edit/'.$_GET['id'];
    }
    

    // On vérifie que le format des données correspond à ce qui est attendu
    $form_data = $form_tools->check_form_fields($_POST);
    
    if($form_data)
    {   
        // Création du Tag à insérer en base de données
        $new_tag = new Tag($form_data);
        $new_tag->setSlug($tools->createSlug($new_tag->name()));

        // Case : création d'un nouvel tag
        if($creation)
        {
            // Création du tag en BDD et renvoi vers la page de succès
            $creation = $manager->create($new_tag);

            // Si la création réussi
            if($creation)
            {
                $tools->redirect('tags/?msgsystem=success_create');
            }
            // Si la création échoue (doublon)
            else
            {
                $tools->redirect($url_redirect.'?msgsystem=warning_existing-element');
            }
        }

        // Case : update d'un tag existant
        else
        {
            // On vérifie que l'ID transmis est correct et que le tag existe
            if(
                !empty($_GET['id']) &&
                !empty($_SESSION['edit_tag']) && 
                $_SESSION['edit_tag'] === $_GET['id'] && 
                $manager->exists($_GET['id'])
            )
            {
                // Stockage de l'ID transmis et destruction de la session
                $id = $_GET['id'];
                unset($_SESSION['edit_tag']);

                $new_tag->setId_tag($id);

                // Update en base de données et redirection vers la page de succès
                $update = $manager->update($new_tag);

                // Si l'update a réussi
                if($update)
                {
                    $tools->redirect('tags/?msgsystem=success_update');
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
// Suppression d'un tag
//***********************************************

function delete_tag(TagManager $manager, Tools $tools) 
{
    // Récupération de l'ID et vérification de l'existence dans la base de données
    if(!empty($_GET['id']) && $manager->exists($_GET['id']))
    {
        $manager->delete($_GET['id']);
        $tools->redirect('tags/?msgsystem=success_delete');
    }
    else
    {
        $tools->redirect('tags/?msgsystem=error_unknown');
    }
}

?>