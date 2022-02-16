<?php

// *** Initialisation des classes

$CommentaireManager = new CommentaireManager($db);
$ArticleManager = new ArticleManager($db);

//***********************************************
// Afficher la liste des commentaires
//***********************************************

function commentaires_list(CommentaireManager $manager, Tools $tools) 
{
    // Si l'utilisateur n'est pas admin, on le renvoit sur la home
    if ($_SESSION['user']->role() !== 0) 
    {
        $commentaires_list = $manager->lists($_SESSION['user']->id_user());
    }
    else
    {
        $commentaires_list = $manager->lists(0);
    }
    
    include (realpath(__DIR__ . '/..').'/view/CommentairesListView.php');
}

//***********************************************
// Edition d'un commentaire
//***********************************************

function edit_commentaire(CommentaireManager $manager, Tools $tools)
{
    // Récupération de l'ID et vérification de l'existence dans la base de données
    if(!empty($_GET['id']) && $manager->exists($_GET['id']))
    {
        $id = $_GET['id'];
        $commentaire = $manager->get($id);
        
        // Création des variables utiles
        $action = "update/".$id;
        $title = "Modérer ce commentaire";
        $_SESSION['edit_commentaire'] = $id;
        $article_name = $manager->getArticleName($id);
    
        // Inclusion de la vue
        include (realpath(__DIR__ . '/..') . '/view/CommentairesEditView.php');
    }
    else
    {
        $tools->redirect('commentaires/?msgsystem=error_unknown');
    }
}

//***********************************************
// Update dans la base de données
//***********************************************

function update_commentaire(CommentaireManager $manager, Tools $tools) 
{
    // Vérification de l'existence du commentaire
    if(
        !empty($_GET['id']) &&
        !empty($_SESSION['edit_commentaire']) && 
        $_SESSION['edit_commentaire'] === $_GET['id'] && 
        $manager->exists($_GET['id'])
    )
    {
        unset($_SESSION['edit_commentaire']);
        
        $id = (int) $_GET['id'];
        
        $commentaire = $manager->get($id);
        
        $commentaire->setIs_active(1);
        
        $manager->update($commentaire);
        
        $tools->redirect('commentaires/?msgsystem=success_update');
    }
    else
    {
        $tools->redirect('commentaires/?msgsystem=error_unknown');
    }
}

//***********************************************
// Suppression d'un commentaire
//***********************************************

function delete_commentaire(CommentaireManager $manager, Tools $tools) 
{
    // Récupération de l'ID et vérification de l'existence dans la base de données
    if(!empty($_GET['id']) && $manager->exists($_GET['id']))
    {
        $manager->delete($_GET['id']);
        $tools->redirect('commentaires/?msgsystem=success_delete');
    }
    else
    {
        $tools->redirect('commentaires/?msgsystem=error_unknown');
    }
}
