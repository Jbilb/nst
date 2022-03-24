<?php

// INIT CLASS

$RestaurantManager = new RestaurantManager($db);

//***********************************************
// Afficher la liste des restaurants
//***********************************************

function restaurants_list(RestaurantManager $manager, Tools $tools) 
{
    // Si l'utilisateur n'est pas admin, on le renvoit sur la home
    if ($_SESSION['user']->role() !== 0) 
    {
         $tools->redirect('?msgsystem=warning_restricted');
    }
    else
    {
        $restaurants_list = $manager->lists();
        include (realpath(__DIR__ . '/..') . '/view/RestaurantsListView.php');
    }
}

//***********************************************
// Nouveau restaurant
//***********************************************

function new_restaurant() 
{
    // Tentative de récupération de la session temporaire, si existante
    if(!empty($_SESSION['temp_data']))
    {
        $restaurant = new Restaurant($_SESSION['temp_data']);
    }
    // Sinon, création de l'objet vide
    else
    {
        $restaurant = new Restaurant([]);
    }
    
    // Définition des actions et variables utiles
    $action = "create/";
    $title = "Création d'un nouveau restaurant";

    $restaurant->setDate_publishing(date('Y-m-d',time()));
    
    // Inclusion de la vue
    include (realpath(__DIR__ . '/..') . '/view/RestaurantEditView.php');
}

//***********************************************
// Edition d'un restaurant
//***********************************************

function edit_restaurant(RestaurantManager $manager, Tools $tools)
{
    // Récupération de l'ID et vérification de l'existence dans la base de données
    if(!empty($_GET['id']) && $manager->exists($_GET['id']))
    {
        $id = $_GET['id'];
        $restaurant = $manager->get($id);
        
        // Tentative de récupération de la session temporaire, si existante
        if(!empty($_SESSION['temp_data']))
        {
            $restaurant = new Restaurant($_SESSION['temp_data']);
        }
        
        // Création des variables utiles
        $action = "update/".$id;
        $title = "Edition d'un restaurant";
        $_SESSION['edit_restaurant'] = $id;
        
        // Inclusion de la vue
        include (realpath(__DIR__ . '/..') . '/view/RestaurantEditView.php');
    }
    else
    {
        $tools->redirect('restaurants/?msgsystem=error_unknown');
    }
}

//***********************************************
// Création / update dans la base de données
//***********************************************

function update_restaurant(RestaurantManager $manager,Tools $tools, FormTools $form_tools, $creation) 
{
    // Création de l'URL de redirection en cas d'erreur
    if($creation)
    {
        $url_redirect = 'restaurants/new';
    }
    else 
    {
        $url_redirect = 'restaurants/edit/'.$_GET['id'];
    }


    // On vérifie que le format des données correspond à ce qui est attendu
    $form_data = $form_tools->check_form_fields($_POST);

    if($form_data)
    {   
        // Création du Restaurant à insérer en base de données
        $new_restaurant = new Restaurant($form_data);
        
        // Case : création d'un nouveau restaurant
        if($creation)
        {
            // Création du restaurant en BDD et renvoi vers la page de succès
            $creation = $manager->create($new_restaurant);

            // Si la création réussi
            if($creation)
            {
                $tools->redirect('restaurants/?msgsystem=success_create');
            }
            // Si la création échoue (doublon)
            else
            {
                $tools->redirect($url_redirect.'?msgsystem=warning_existing-element');
            }
        }

        // Case : update d'un restaurant existant
        else
        {
            // On vérifie que l'ID transmis est correct et que le restaurant existe
            if(
                !empty($_GET['id']) &&
                !empty($_SESSION['edit_restaurant']) && 
                $_SESSION['edit_restaurant'] === $_GET['id'] && 
                $manager->exists($_GET['id'])
            )
            {
                // Stockage de l'ID transmis et destruction de la session
                $id = $_GET['id'];
                unset($_SESSION['edit_restaurant']);

                $new_restaurant->setId_restaurant($id);
                
                // Update en base de données et redirection vers la page de succès
                $update = $manager->update($new_restaurant);

                // Si l'update a réussi
                if($update)
                {
                    $tools->redirect('restaurants/?msgsystem=success_update');
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
// Suppression d'un restaurant
//***********************************************

function delete_restaurant(RestaurantManager $manager, Tools $tools) 
{
    // Récupération de l'ID et vérification de l'existence dans la base de données
    if(!empty($_GET['id']) && $manager->exists($_GET['id']))
    {
        $manager->delete($_GET['id']);
        $tools->redirect('restaurants/?msgsystem=success_delete');
    }
    else
    {
        $tools->redirect('restaurants/?msgsystem=error_unknown-element');
    }
}

?>