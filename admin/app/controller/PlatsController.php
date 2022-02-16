<?php

// *** Instanciation de la classe
$PlatManager = new PlatManager($db);

//***********************************************
// Afficher la liste des plats
//***********************************************

function plats_list(PlatManager $manager, Tools $tools) 
{
    // Si l'utilisateur n'est pas admin, on le renvoit sur la home
    if ($_SESSION['user']->role() !== 0) 
    {
         $tools->redirect('?msgsystem=warning_restricted');
    }
    else
    {
        $plats_list = $manager->lists();
        include (realpath(__DIR__ . '/..') . '/view/PlatsListView.php');
    }
}

//***********************************************
// Nouveau plat
//***********************************************

function new_plat() 
{
    // Tentative de récupération de la session temporaire, si existante
    if(!empty($_SESSION['temp_data']))
    {
        $plat = new Plat($_SESSION['temp_data']);
    }
    // Sinon, création de l'objet vide
    else
    {
        $plat = new Plat([]);
    }
    
    // Définition des actions
    $action = "create/";
    $title = "Création d'un nouveau plat";
    
    // Inclusion de la vue
    include (realpath(__DIR__ . '/..') . '/view/PlatEditView.php');
}

//***********************************************
// Edition d'un plat
//***********************************************

function edit_plat(PlatManager $manager, Tools $tools)
{
    // Récupération de l'ID et vérification de l'existence dans la base de données
    if(!empty($_GET['id']) && $manager->exists($_GET['id']))
    {
        $id = $_GET['id'];
        $plat = $manager->get($id);
        
        if(!empty($_SESSION['temp_data']))
        {
            $plat = new Plat($_SESSION['temp_data']);
        }
        
        // Création des variables utiles
        $action = "update/".$id;
        $title = "Edition d'un nouveau plat";
        $_SESSION['edit_plat'] = $id;
    
        // Inclusion de la vue
        include (realpath(__DIR__ . '/..') . '/view/PlatEditView.php');
    }
    else
    {
        $tools->redirect('plats/?msgsystem=error_unknown');
    }
}

//***********************************************
// Création / update dans la base de données
//***********************************************

function update_plat(PlatManager $manager, Tools $tools, FormTools $form_tools, $creation) 
{
    // Création de l'URL de redirection en cas d'erreur
    if($creation)
    {
        $url_redirect = 'plats/new';
    }
    else 
    {
        $url_redirect = 'plats/edit/'.$_GET['id'];
    }
    

    // On vérifie que le format des données correspond à ce qui est attendu
    $form_data = $form_tools->check_form_fields($_POST);
    
    if($form_data)
    {   
        // Création du Plat à insérer en base de données
        $new_plat = new Plat($form_data);
        
        // Case : création d'un nouveau plat
        if($creation)
        {
            // Création du plat en BDD et renvoi vers la page de succès
            $creation = $manager->create($new_plat);

            // Si la création réussi
            if($creation)
            {
                $tools->redirect('plats/?msgsystem=success_create');
            }
            // Si la création échoue (doublon)
            else
            {
                $tools->redirect($url_redirect.'?msgsystem=warning_existing-element');
            }
        }

        // Case : update d'un plat existant
        else
        {
            // On vérifie que l'ID transmis est correct et que le plat existe
            if(
                !empty($_GET['id']) &&
                !empty($_SESSION['edit_plat']) && 
                $_SESSION['edit_plat'] === $_GET['id'] && 
                $manager->exists($_GET['id'])
            )
            {
                // Stockage de l'ID transmis et destruction de la session
                $id = $_GET['id'];
                unset($_SESSION['edit_plat']);

                $new_plat->setId_plat($id);
                
                // Update en base de données et redirection vers la page de succès
                $update = $manager->update($new_plat);

                // Si l'update a réussi
                if($update)
                {
                    $tools->redirect('plats/?msgsystem=success_update');
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
// Suppression d'un plat
//***********************************************

function delete_plat(PlatManager $manager, Tools $tools) 
{
    // Récupération de l'ID et vérification de l'existence dans la base de données
    if(!empty($_GET['id']) && $manager->exists($_GET['id']))
    {
        if($manager->usedInCategorie($_GET['id'])) 
        {
            // Si le plat est utilisé dans un article, on empêche sa suppression
            $tools->redirect('plats/?msgsystem=error_used');
        }
        else
        {
            $manager->delete($_GET['id']);
            $tools->redirect('plats/?msgsystem=success_delete');
        }
    }
    else
    {
        $tools->redirect('plats/?msgsystem=error_unknown');
    }
}

?>