<?php

// *** Instanciation des classes

$manager = new UserManager($db);
$UserManager = new UserManager($db);

//***********************************************
// Afficher la liste des users
//***********************************************

function users_list(UserManager $manager) 
{
    $users_list = $manager->lists();
    include (realpath(__DIR__ . '/..') . '/view/UsersListView.php');
}

//***********************************************
// Nouvel utilisateur
//***********************************************

function new_user() 
{
    // Création de l'objet user 
    if(!empty($_SESSION['temp_data']))
    {
        $user = new User($_SESSION['temp_data']);
    }
    else
    {
        $user = new User([]);
    }
    
    // Définition des actions
    $action = "create/";
    $title = "Création d'un nouvel utilisateur";
    
    // Inclusion de la vue
    include (realpath(__DIR__ . '/..') . '/view/UsersEditView.php');
}

//***********************************************
// Edition d'un utilisateur
//***********************************************

function edit_user(UserManager $manager, Tools $tools) 
{
    // Récupération de l'ID et vérification de l'existence dans la base de données
    if(!empty($_GET['id']) && $manager->exists($_GET['id']))
    {
        $id = $_GET['id'];
        
        // Récupération de l'utilisateur dans la base de données
        $user = $manager->get($id);
        
        if(!empty($_SESSION['temp_data']))
        {
            $user = new User($_SESSION['temp_data']);
        }
        
        // Création des variables utiles
        $action = "update/".$id;
        $title = "Edition d'un utilisateur";
        $_SESSION['edit_user'] = $id;
    
        // Inclusion de la vue
        include (realpath(__DIR__ . '/..') . '/view/UsersEditView.php');
    }
    else
    {
        $tools->redirect('users/?msgsystem=error_unknown');
    }
}

//***********************************************
// Création / update d'un utilisateur dans la database
//***********************************************

function update_user(UserManager $manager, Tools $tools, FormTools $form_tools, $creation) 
{
    $form_data = $form_tools->check_form_fields($_POST);
    if($form_data)
    {
        // Création de l'objet User
        $new_user = new User($form_data);

        // Case : création d'un nouvel utilisateur
        if($creation)
        {
            // Création de l'objet User et hashage du mot de passe
            $new_user->hash();
            
            // Si le mail existe déjà en base de données, on renvoit à la page précédente
            if($manager->matchMail($new_user->email()))
            {
                $tools->redirect('users/new/?msgsystem=error_existing');
                die();
            }
            
            // Création de l'utilisateur en BDD et renvoi vers la page de succès
            $manager->create($new_user);
            $tools->redirect('users/?msgsystem=success_create');
        }

        // Case : update d'un utilisateur existant
        else
        {
            // On vérifie que l'ID transmis est correct et que l'utilisateur existe
            if(
                !empty($_GET['id']) &&
                !empty($_SESSION['edit_user']) && 
                $_SESSION['edit_user'] === $_GET['id'] && 
                $manager->exists($_GET['id'])
            )
            {
                // Stockage de l'ID transmis et destruction de la session
                $id = $_GET['id'];
                unset($_SESSION['edit_user']);
                $new_user->setId_user($id);

                // Récupération de l'utilisateur existant avant modification
                $old_user = $manager->get($id);

                // Comparaison des mots de passe : si modifié, on le re-hash
                if($new_user->password() !== $old_user->password())
                {
                    $new_user->hash();
                }

                // Update en base de données et redirection vers la page de succès
                $manager->update($new_user);
                $tools->redirect('users/?msgsystem=success_update');
            }

        }
    }
    else 
    {
        // Un ou plusieurs champ(s) ne correspond(ent) pas au(x) format(s) attendu(s)
        $tools->redirect('users/new?msgsystem=warning_error-format');
    }
}

//***********************************************
// Suppression d'un utilisateur
//***********************************************

function delete_user(UserManager $manager, Tools $tools) 
{
    // Récupération de l'ID et vérification de l'existence dans la base de données
    if(!empty($_GET['id']) && $manager->exists($_GET['id']))
    {
        $manager->delete($_GET['id']);
        $tools->redirect('users/?msgsystem=success_delete');
    }
    else
    {
        $tools->redirect('users/?msgsystem=error_unknown');
    }
}
