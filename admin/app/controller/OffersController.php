<?php

// INIT CLASS

$OfferManager = new OfferManager($db);

//***********************************************
// Afficher la liste des offers
//***********************************************

function offers_list(OfferManager $manager, Tools $tools) 
{
    // Si l'utilisateur n'est pas admin, on le renvoit sur la home
    if ($_SESSION['user']->role() !== 0) 
    {
         $tools->redirect('?msgsystem=warning_restricted');
    }
    else
    {
        $offer_list = $manager->lists();
        include (realpath(__DIR__ . '/..') . '/view/OffersListView.php');
    }
}

//***********************************************
// Nouvelle offer
//***********************************************

function new_offer() 
{
    // Tentative de récupération de la session temporaire, si existante
    if(!empty($_SESSION['temp_data']))
    {
        $offer = new Offer($_SESSION['temp_data']);
    }
    // Sinon, création de l'objet vide
    else
    {
        $offer = new Offer([]);
    }
    
    // Définition des actions et variables utiles
    $action = "create/";
    $title = "Création d'une nouvelle offre";
    
    // Inclusion de la vue
    include (realpath(__DIR__ . '/..') . '/view/OffreEditView.php');
}

//***********************************************
// Edition d'une offer
//***********************************************

function edit_offer(OfferManager $manager, Tools $tools)
{
    // Récupération de l'ID et vérification de l'existence dans la base de données
    if(!empty($_GET['id']) && $manager->exists($_GET['id']))
    {
        $id = $_GET['id'];
        $offer = $manager->get($id);
        
        // Tentative de récupération de la session temporaire, si existante
        if(!empty($_SESSION['temp_data']))
        {
            $offer = new Offer($_SESSION['temp_data']);
        }
        
        // Création des variables utiles
        $action = "update/".$id;
        $title = "Edition d'une offre";
        $_SESSION['edit_offer'] = $id;
        
        // Inclusion de la vue
        include (realpath(__DIR__ . '/..') . '/view/OffreEditView.php');
    }
    else
    {
        $tools->redirect('offers/?msgsystem=error_unknown');
    }
}

//***********************************************
// Création / update dans la base de données
//***********************************************

function update_offer(OfferManager $manager,Tools $tools, FormTools $form_tools, $creation) 
{
    // Création de l'URL de redirection en cas d'erreur
    if($creation)
    {
        $url_redirect = 'offers/new';
    }
    else 
    {
        $url_redirect = 'offers/edit/'.$_GET['id'];
    }


    // On vérifie que le format des données correspond à ce qui est attendu
    $form_data = $form_tools->check_form_fields($_POST);

    if($form_data)
    {   
        // Création de la offer à insérer en base de données
        $new_offer = new Offer($form_data);
        
        // Case : création d'un nouvelle offer
        if($creation)
        {
            // Création de la offer en BDD et renvoi vers la page de succès
            $creation = $manager->create($new_offer);

            // Si la création réussi
            if($creation)
            {
                $tools->redirect('offers/?msgsystem=success_create');
            }
            // Si la création échoue (doublon)
            else
            {
                $tools->redirect($url_redirect.'?msgsystem=warning_existing-element');
            }
        }

        // Case : update d'une offer existante
        else
        {
            // On vérifie que l'ID transmis est correct et que la offer existe
            if(
                !empty($_GET['id']) &&
                !empty($_SESSION['edit_offer']) && 
                $_SESSION['edit_offer'] === $_GET['id'] && 
                $manager->exists($_GET['id'])
            )
            {
                // Stockage de l'ID transmis et destruction de la session
                $id = $_GET['id'];
                unset($_SESSION['edit_offer']);

                $new_offer->setId_offer($id);
                
                // Update en base de données et redirection vers la page de succès
                $update = $manager->update($new_offer);

                // Si l'update a réussi
                if($update)
                {
                    $tools->redirect('offers/?msgsystem=success_update');
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
// Suppression d'une offer
//***********************************************

function delete_offer(OfferManager $manager, Tools $tools) 
{
    // Récupération de l'ID et vérification de l'existence dans la base de données
    if(!empty($_GET['id']) && $manager->exists($_GET['id']))
    {
        $manager->delete($_GET['id']);
        $tools->redirect('offers/?msgsystem=success_delete');
    }
    else
    {
        $tools->redirect('offers/?msgsystem=error_unknown-element');
    }
}

?>