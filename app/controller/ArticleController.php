<?php

// *** Récupération de l'article

// *** Cas 1 : Mode apercu (récupération via ID)
if(isset($_GET['id_article']) && isset($_GET['apercu']))
{
    $id_article = $_GET['id_article'];
    $article = $ArticleManager->get($id_article);
    
    // La page ne DOIT PAS être indexée (article non publié)
    $META_robots = "noindex,nofollow";
}
// *** Cas 2 : Récupération de l'article publié
elseif(isset($_GET['slug']))
{
    $slug = $_GET['slug'];
    $article = $ArticleManager->getBySlug($slug);
    
    // La page peut être indéxée (article publié)
    $META_robots = "index,follow";
}
else
{
    $tools->redirect($NAV_mag,true);
}

// Si aucun article n'est récupéré >> Renvoi à la home du mag
if(!$article)
{
    $tools->redirect($NAV_mag,true);
}

// Si on est pas en mode apercu, et que l'article n'est pas publié >> Renvoi vers la home
if(!isset($_GET['apercu']) && !$article->is_active())
{
    $tools->redirect($NAV_mag,true);
}

// *** Récupération des commentaires

$commentaires_list = $ArticleManager->getComments($article->id_article());

// *** Ajout d'une lecture de l'article

$ArticleManager->ajoutLecture($article->id_article());

// *** Récupération des articles similaires
$articles_similar = [];

// *** Fonction permettant de trier les articles par nombre de tags similaires avec l'article courant
foreach($articles_list as $key => $objet) {
    if($objet->id_article() != $article->id_article()) {
        $compare = array_intersect($article->tags(),$objet->tags());
        $length = count($compare);
        $articles_similar[$objet->id_article()] = $length;
    }
}

// *** Tri par ordre décroissant (du plus similaire au moins similaire)
arsort($articles_similar);

$articles_similar_list = [];

foreach($articles_similar as $id => $match) {
    foreach($articles_list as $key => $objet) {
        if($objet->id_article() == $id) {
            $articles_similar_list[] = $objet;
            break;
        }
    }
}

// Récupération du nom de la catégorie

$article_categorie = $CategorieManager->getName($article->id_categorie());

// Récupération des tags

$article_tags = [];
foreach($article->tags() as $id_tag)
{
    $article_tags[] = $TagManager->get($id_tag);
}

// *** Création du corps de l'article

$article_body = $article->create_body();
ksort($article_body);

// *** Meta Title & Description

$META_title = $article->title().' | Le Mag '.$client_name;
$META_description = $tools->createPreview($article->intro_text(), 160);

$ogURL = SITE_FRONT_BASE.$NAV_mag_article.$article->slug();
$ogIMG = SITE_FRONT_BASE.$article->cover_image();
$META_author = $client_name;

?>