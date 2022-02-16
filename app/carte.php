<?php 
//VARIABLES
$PAGE_name = 'carte';
$HEADER_title = '<span>DÉCOUVREZ</span><br/> <span>LE CONCEPT</span><br/> <span>ONE COACHING.</span>';
//INCLUDE HELPER & HEADER

include 'includes/header.php'; 
?>

<section id="section-top">

<?php
$categories_menu = $menu->categories_menu();

// Affichage de toutes les catégories du menu
foreach($categories_menu as $key => $id) {
    echo $categories_menu_name_list[$id];
    echo nl2br("\n"); // saut de ligne

    $plats_serialized = $CategorieMenuManager->get($id)->plats();
    $plats = [];

    // *** AFFICHAGE PLATS *** //
    // Si la catégorie contient des plats, on les affiche
    if ($plats_serialized != NULL) {
        // Récupération des plats appartenant à la catégorie
        foreach ($plats_serialized as $key => $id2) {
            $plats[] = $PlatManager->get($id2);
        };
        
        // Affichage données du plat
        foreach($plats as $plat) {
            echo $plat->title();
            echo nl2br("\n"); // saut de ligne

            echo $plat->descriptif();
            echo nl2br("\n");

            echo $plat->price();
            echo nl2br("\n");
        }
    }

    // *** AFFICHAGE SOUS-CATEGORIES *** //
    // Si la catégorie contient des sous-catégories, on les affiche
    $sous_categories_serialized = $CategorieMenuManager->get($id)->sous_categories();
    $sous_categories = [];

    if ($sous_categories_serialized != NULL) {
        // Récupération des sous-catégories
        foreach ($sous_categories_serialized as $key => $id3) {
            $sous_categories[] = $CategorieMenuManager->get($id3);
        };

        // Affichage nom de la sous-catégorie
        echo $categories_menu_name_list[$id3];
        echo nl2br("\n");

        // Si la sous-catégorie contient des plats, on les affiche
        
        $plats_serialized = $CategorieMenuManager->get($id3)->plats();
        $plats = [];
        
        // *** AFFICHAGE PLATS DE LA SOUS-CATEGORIE *** //
        // Si la catégorie contient des plats, on les affiche
        if ($plats_serialized != NULL) {
            // Récupération des plats appartenant à la catégorie
            foreach ($plats_serialized as $key => $id) {
                $plats[] = $PlatManager->get($id);
            };
                
            // Affichage des données du plat
            foreach($plats as $plat) {
                echo $plat->title();
                echo nl2br("\n"); // saut de ligne
        
                echo $plat->descriptif();
                echo nl2br("\n");
        
                echo $plat->price();
                echo nl2br("\n");
            }
        }
    }
}
    
?>

</section>

<?php include 'includes/footer.php'; ?>