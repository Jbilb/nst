<?php

// *** Définition des métas (title / description)

$META_title = "Découvrez tous nos articles | Le Mag' ".$client_name;
$META_description = "Découvrez une sélection d'articles pour connaitre toute notre actualité et nos nouveauté dans le mag' ".$client_name;
$META_author = $client_name;
$META_robots = "index,follow";

// *** Récupération de la liste des articles (par catégorie ou par tag)
$categorie_get = false;
$tag_get = false;

if(isset($_GET['slug']))
{
    $categorie_get = $CategorieManager->getBySlug($_GET['slug']);
    $tag_get = $TagManager->getBySlug($_GET['slug']);
    
    if(!$categorie_get && !$tag_get)
    {
        $tools->redirect('mag/',true);
    }
    
    // *** Si c'est une catégorie récupérée en GET
    if($categorie_get)
    {
        // *** Mise à jour de la liste des articles
        $articles_list = $ArticleManager->create_list(true,$categorie_get->id_categorie());
        
        // *** Mise à jour des metas
        $META_title = "Découvrez les articles de la catégorie ".mb_strtolower($categorie_get->name())." | Le Mag' ".$client_name;
        $META_description = "Découvrez tous nos articles de la catégorie ".mb_strtolower($categorie_get->name())." dans le mag' ".$client_name;
    }
    elseif($tag_get)
    {
        // *** Mise à jour de la liste des articles
        $articles_list = $ArticleManager->create_list(true,false,$tag_get->id_tag());
        
        // *** Mise à jour des metas
        $META_title = "Découvrez les articles liés au mot-clé ".mb_strtolower($tag_get->name())." | Le Mag' ".$client_name;
        $META_description = "Découvrez tous nos articles liés au mot-clé ".mb_strtolower($tag_get->name())." dans le mag' ".$client_name;
        
    }
}

// *** Récupération de la liste des articles (par catégorie ET par tag)
if(isset($_GET['categorie']) && isset($_GET['tag']))
{
    $categorie_get = $CategorieManager->getBySlug($_GET['categorie']);
    $tag_get = $TagManager->getBySlug($_GET['tag']);
    
    if(!$categorie_get || !$tag_get)
    {
        $tools->redirect('mag/',true);
    }
    else
    {
        // *** Récupération des articles
        $articles_list = $ArticleManager->create_list(true,$categorie_get->id_categorie(),$tag_get->id_tag());
        
        // *** Mise à jour des metas
        $META_title = "Découvrez nos articles ".mb_strtolower($categorie_get->name())." / ".$tag_get->name()." | Le Mag' ".$client_name;
        $META_description = "Découvrez tous nos articles de la catégorie ".mb_strtolower($categorie_get->name())." et associés au mot-clé ".mb_strtolower($tag_get->name())." dans le mag' ".$client_name;
    }
}

?>