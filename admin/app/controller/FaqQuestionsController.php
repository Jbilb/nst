<?php

// INIT CLASS

$FaqQuestionManager = new FaqQuestionManager($db);

//***********************************************
// Afficher la liste des faq
//***********************************************

function faq_questions_list(FaqQuestionManager $manager, Tools $tools) 
{
    // Si l'utilisateur n'est pas admin, on le renvoit sur la home
    if ($_SESSION['user']->role() !== 0) 
    {
         $tools->redirect('?msgsystem=warning_restricted');
    }
    else
    {
        $faq_questions_list = $manager->lists();
        include (realpath(__DIR__ . '/..') . '/view/FaqQuestionsListView.php');
    }
}

//***********************************************
// Nouvelle faq
//***********************************************

function new_faq_question() 
{
    // Tentative de récupération de la session temporaire, si existante
    if(!empty($_SESSION['temp_data']))
    {
        $faq_question = new FaqQuestion($_SESSION['temp_data']);
    }
    // Sinon, création de l'objet vide
    else
    {
        $faq_question = new FaqQuestion([]);
    }
    
    // Définition des actions et variables utiles
    $action = "create/";
    $title = "Création d'une nouvelle F.A.Q.";
    
    // Inclusion de la vue
    include (realpath(__DIR__ . '/..') . '/view/FaqQuestionEditView.php');
}

//***********************************************
// Edition d'une faq
//***********************************************

function edit_faq_question(FaqQuestionManager $manager, Tools $tools)
{
    // Récupération de l'ID et vérification de l'existence dans la base de données
    if(!empty($_GET['id']) && $manager->exists($_GET['id']))
    {
        $id = $_GET['id'];
        $faq_question = $manager->get($id);
        
        // Tentative de récupération de la session temporaire, si existante
        if(!empty($_SESSION['temp_data']))
        {
            $faq_question = new FaqQuestion($_SESSION['temp_data']);
        }
        
        // Création des variables utiles
        $action = "update/".$id;
        $title = "Edition d'une F.A.Q.";
        $_SESSION['edit_faq_question'] = $id;
        
        // Inclusion de la vue
        include (realpath(__DIR__ . '/..') . '/view/FaqQuestionEditView.php');
    }
    else
    {
        $tools->redirect('faq_questions/?msgsystem=error_unknown');
    }
}

//***********************************************
// Création / update dans la base de données
//***********************************************

function update_faq_question(FaqQuestionManager $manager,Tools $tools, FormTools $form_tools, $creation) 
{
    // Création de l'URL de redirection en cas d'erreur
    if($creation)
    {
        $url_redirect = 'faq_questions/new';
    }
    else 
    {
        $url_redirect = 'faq_questions/edit/'.$_GET['id'];
    }


    // On vérifie que le format des données correspond à ce qui est attendu
    $form_data = $form_tools->check_form_fields($_POST);

    if($form_data)
    {   
        // Création de la faq à insérer en base de données
        $new_faq_question = new FaqQuestion($form_data);
        
        // Case : création d'un nouvelle faq
        if($creation)
        {
            // Création de la faq en BDD et renvoi vers la page de succès
            $creation = $manager->create($new_faq_question);

            // Si la création réussi
            if($creation)
            {
                $tools->redirect('faq_questions/?msgsystem=success_create');
            }
            // Si la création échoue (doublon)
            else
            {
                $tools->redirect($url_redirect.'?msgsystem=warning_existing-element');
            }
        }

        // Case : update d'une faq existante
        else
        {
            // On vérifie que l'ID transmis est correct et que la faq existe
            if(
                !empty($_GET['id']) &&
                !empty($_SESSION['edit_faq_question']) && 
                $_SESSION['edit_faq_question'] === $_GET['id'] && 
                $manager->exists($_GET['id'])
            )
            {
                // Stockage de l'ID transmis et destruction de la session
                $id = $_GET['id'];
                unset($_SESSION['edit_faq_question']);

                $new_faq_question->setId_faq_question($id);
                
                // Update en base de données et redirection vers la page de succès
                $update = $manager->update($new_faq_question);

                // Si l'update a réussi
                if($update)
                {
                    $tools->redirect('faq_questions/?msgsystem=success_update');
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
// Suppression d'une faq
//***********************************************

function delete_faq_question(FaqQuestionManager $manager, Tools $tools) 
{
    // Récupération de l'ID et vérification de l'existence dans la base de données
    if(!empty($_GET['id']) && $manager->exists($_GET['id']))
    {
        $manager->delete($_GET['id']);
        $tools->redirect('faq_questions/?msgsystem=success_delete');
    }
    else
    {
        $tools->redirect('faq_questions/?msgsystem=error_unknown-element');
    }
}

?>