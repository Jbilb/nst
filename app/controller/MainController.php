<?php

// session_start();

spl_autoload_register(function ($classname) {
    global $folder_admin;
    require(realpath(__DIR__ . '/..').'/'.$folder_admin.'models/'.$classname.'.php');
});

// ========================================================
// Connexion à la base de données
// ======================================================== 

$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4', DB_USER, DB_PASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

// *** Instanciation des classes

$ArticleManager = new ArticleManager($db);
$TagManager = new TagManager($db);
$CategorieManager = new CategorieManager($db);
$CommentaireManager = new CommentaireManager($db);
$tools = new Tools();

$CategorieMenuManager = new CategorieMenuManager($db);
$MenuManager = new MenuManager($db);
$PlatManager = new PlatManager($db);

// *** Récupération de la liste des catégories

$categories_list = $CategorieManager->lists();

// *** Récupération de la liste des tags

$tags_list = $TagManager->lists(true);

// *** Récupération de la liste de tous les articles (publiés)

$articles_list = $ArticleManager->create_list(true);

// *** Récupération de la liste des articles en une (publiés)

$articles_featured_list = $ArticleManager->create_list_featured(false,1);

// *** Récupération de la liste des catégories du menu

$categories_menu_list = $CategorieMenuManager->lists();

// *** Récupération du menu

$menu = $MenuManager->get(1);

// *** Récupération de la liste des plats

$plats_list = $PlatManager->lists();

// *** Récupération des noms des catégories de menu

$categories_menu_name_list = [];
foreach ($categories_menu_list as $categorie_menu) {
    $categories_menu_name_list[$categorie_menu->id_categorie_menu()] = $categorie_menu->name();
}

$META_robots = "index,follow";

?>
