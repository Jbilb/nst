<?php

// INIT CLASS

$ArticleManager = new ArticleManager($db);
$TagManager = new TagManager($db);
$CategorieManager = new CategorieManager($db);

//***********************************************
// Afficher la liste des articles
//***********************************************

function articles_list(ArticleManager $manager, CategorieManager $CategorieManager) 
{
    if ($_SESSION['user']->role() !== 0) 
    {
        $article_list = $manager->lists($_SESSION['user']->id_user());
    }
    else
    {
        $article_list = $manager->lists(0);
    }
    
    include (realpath(__DIR__ . '/..') . '/view/ArticlesListView.php');
}

//***********************************************
// Nouvel article
//***********************************************

function new_article(TagManager $TagManager, CategorieManager $CategorieManager) 
{
    // Tentative de récupération de la session temporaire, si existante
    if(!empty($_SESSION['temp_data']))
    {
        $article = new Article($_SESSION['temp_data']);
    }
    // Sinon, création de l'objet vide
    else
    {
        $article = new Article([]);
    }
    
    // Définition des actions et variables utiles
    $action = "create/";
    $title = "Création d'un nouvel article";
    $list_tags = $TagManager->lists();
    $list_name_tags = [];
    foreach($list_tags as $tag) 
    {
        $list_name_tags[$tag->id_tag()] = $tag->name();
    }
    
    $article->setDate_publication(date('Y-m-d',time()));
    
    $list_categories = $CategorieManager->lists();
    
    // Création et build du corps de la page
    $page_body = $article->create_body();
    ksort($page_body);
    
    // Inclusion de la vue
    include (realpath(__DIR__ . '/..') . '/view/ArticleEditView.php');
}

//***********************************************
// Edition d'un article
//***********************************************

function edit_article(ArticleManager $manager, CategorieManager $CategorieManager, TagManager $TagManager, Tools $tools)
{
    // Récupération de l'ID et vérification de l'existence dans la base de données
    if(!empty($_GET['id']) && $manager->exists($_GET['id']))
    {
        $id = $_GET['id'];
        $article = $manager->get($id);
        
        // Tentative de récupération de la session temporaire, si existante
        if(!empty($_SESSION['temp_data']))
        {
            $article = new Article($_SESSION['temp_data']);
        }
        
        // Création des variables utiles
        $action = "update/".$id;
        $title = "Edition d'un article";
        $_SESSION['edit_article'] = $id;
        
        // Récupération des tags
        $list_tags = $TagManager->lists();
        $list_name_tags = [];
        foreach($list_tags as $tag) 
        {
            $list_name_tags[$tag->id_tag()] = $tag->name();
        }
        
        $list_categories = $CategorieManager->lists();

        // Création et build du corps de la page
        $page_body = $article->create_body();
        ksort($page_body);
        
        // Inclusion de la vue
        include (realpath(__DIR__ . '/..') . '/view/ArticleEditView.php');
    }
    else
    {
        $tools->redirect('articles/?msgsystem=error_unknown');
    }
}

//***********************************************
// Création / update dans la base de données
//***********************************************

function update_article(ArticleManager $manager, TagManager $TagManager, Tools $tools, FormTools $form_tools, $creation) 
{
    // Création de l'URL de redirection en cas d'erreur
    if($creation)
    {
        $url_redirect = 'articles/new';
    }
    else 
    {
        $url_redirect = 'articles/edit/'.$_GET['id'];
    }
    
    
    $form_data = $form_tools->check_form_fields($_POST,$_FILES);
    if($form_data)
    {   
        // Création de l'objet Article
        $new_article = new Article($form_data);

    
        // Création et assignation du slug
        $new_article->setSlug($tools->createSlug($new_article->title()));

        // Gestionnaire des tags (avec possibilité de création directe si le mot clé n'existe pas)
        $tags_array = [];
        $tags_ids = [];
        $tags = $new_article->tags();

        // Suppression des doublons
        foreach($tags as $key => $tag_name)
        {

            $slug = $tools->createSlug($tag_name);
            if(in_array($slug,$tags_array))
            {
                unset($tags[$key]);
            }
            else
            {
                $tags_array[] = [
                    'name' => $tag_name,
                    'slug' => $slug
                ];
            }
        }

        // Création des tags inexistants
        foreach($tags_array as $item)
        {
            // Si le slug existe déjà en BDD, on récupère l'ID associé
            if($TagManager->matchName($item['slug']))
            {
                $tag = $TagManager->getBySlug($item['slug']);
                $tags_ids[] = $tag->id_tag();
            }
            // Sinon, on crée le Tag
            else
            {
                $tag_to_add = new Tag([
                    'name' => $item['name'],
                    'slug' => $item['slug']
                ]);
                $tags_ids[] = $TagManager->create($tag_to_add);
            }
        }

        // Assignation du tableau d'ID à l'objet "article"
        $new_article->setTags($tags_ids);
        
        // Case : création d'un nouvel article
        if($creation)
        {
            // Assignation de l'identifiant de l'utilisateur 
            $new_article->setId_user($_SESSION['user']->id_user());
            $new_article->setAuteur($_SESSION['user']->firstname().' '.$_SESSION['user']->lastname());
            
            // Création du domaine d'article en BDD et renvoi vers la page de succès
            $manager->create($new_article);
            $tools->redirect('articles/?msgsystem=success_create');
        }

        // Case : update d'une article existante
        else
        {
            // On vérifie que l'ID transmis est correct et que le article existe
            if(
                !empty($_GET['id']) &&
                !empty($_SESSION['edit_article']) && 
                $_SESSION['edit_article'] === $_GET['id'] && 
                $manager->exists($_GET['id'])
            )
            {
                // Stockage de l'ID transmis et destruction de la session
                $id = $_GET['id'];
                unset($_SESSION['edit_article']);

                $old_article = $manager->get($id);

                if(!$old_article->is_active() && $new_article->is_active())
                {
                    $new_article->setDate_publication(date('d-m-Y'));
                }

                $new_article->setId_article($id);

                // Update en base de données et redirection vers la page de succès
                $manager->update($new_article);
                $tools->redirect('articles/?msgsystem=success_update');
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
// Suppression d'un article
//***********************************************

function delete_article(ArticleManager $manager, Tools $tools) 
{
    // Récupération de l'ID et vérification de l'existence dans la base de données
    if(!empty($_GET['id']) && $manager->exists($_GET['id']))
    {
        $manager->delete($_GET['id']);
        $tools->redirect('articles/?msgsystem=success_delete');
    }
    else
    {
        $tools->redirect('articles/?msgsystem=error_unknown-element');
    }
}

?>