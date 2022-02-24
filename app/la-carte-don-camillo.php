<?php 
//VARIABLES
$PAGE_name = 'page_carte';
$HEADER_title = 'Notre carte';
$HEADER_subtitle = 'Des bons produits et basta !';
//INCLUDE HELPER & HEADER

include 'includes/header.php'; 
?>

<section id="section-top">
    <section class="c-aside vert-bg" id="distributeur">
        <span class="illustration anim-illustration woow parallax" data-css="transform" off-start="20" off-end="80"
            data-start="translateY(0%)" data-end="translateY(40%)" data-anchor="#distributeur" data-woow-offset="80">
            <img src="img/svg/basilic-vert.svg" alt="Burger Don Camillo">
        </span>
        <div class="container">
            <div class="row row-flex">
                <div class="col-xs-12 col-md-4 col-md-offset-1">
                    <h3 class="h3 rose anim-title woow" data-woow-toggle="true" data-woow-offset="80"><span>À table
                            !</span></h3>
                    <div class="s-trait v-margeTitre anim-tiret woow" data-woow-toggle="true" data-woow-offset="80"
                        style="--traitColor: #E39077;"><span><?php include "img/svg/tiret.svg";?></span></div>
                    <p class="blanc anim-opacity woow" data-woow-toggle="true" data-woow-offset="70">Passionnés de
                        cuisine et amoureux du goût, chez Don Camillo, nous ne jurons que par le fait-maison. Nos pizzas
                        gastronomiques sont façonnées à la main, tout comme l’ensemble de nos pâtes qui sont pétries et
                        préparées dans nos cuisines. </p>
                </div>
                <div class="col-xs-12 col-md-5 col-md-offset-1">
                    <span class="s-pastille anim-pastille woow" data-woow-offset="80">
                        <span class="cercle">
                            <img src="img/svg/pastille-pizza-texte.svg" alt="pastille-pizza-texte">
                        </span>
                        <span class="icons pizza">
                            <img src="img/svg/pastille-pizza.svg" alt="Pizza Don Camillo">
                        </span>
                    </span>
                    <figure class="img anim-img-parallax" id="imgDistributeur">
                        <img width="375" height="385" class="parallax speedImg" data-css="transform"
                            data-start="translateY(-5%)" data-end="translateY(0%)" data-anchor="#imgDistributeur"
                            src="img/content/carte/pizzas-don-camillo.jpg" alt="Pizzas Don Camillo">
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <section class="laCarte beige-bg" id="carte-don-camillo">
        <span class="illustration-huile anim-illustration woow" data-woow-offset="80">
            <img src="img/svg/huile-piquante-beige.svg" alt="Huile piquante Don Camillo">
        </span>
        <span class="illustration-romarin anim-illustration woow" data-woow-offset="80">
            <img src="img/svg/romarin-beige.svg" alt="Huile piquante Don Camillo">
        </span>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 hidden-md hidden-lg hidden-xl center">
                    <span class="s-pastille anim-pastille woow" data-woow-offset="80">
                        <span class="cercle">
                            <img src="img/svg/pastille-pizza-texte.svg" alt="pastille-pizza-texte">
                        </span>
                        <span class="icons pizza">
                            <img src="img/svg/pastille-pizza.svg" alt="Pizza Don Camillo">
                        </span>
                    </span>
                </div>
                <div class="col-xs-12 col-xl-10 col-xl-offset-1">
                    <div class="laCarte_content anim-opacity woow" data-woow-offset="80">
                        <?php
                            $categories_menu = $menu->categories_menu();

                            foreach($categories_menu as $key => $id) {
                                
                            // * TABLEAU DES PLATS * //
                            $plats_serialized = $CategorieMenuManager->get($id)->plats();
                            $plats = [];
                            // * TABLEAU DES SOUS CATÉGORIES * //
                            $sous_categories_serialized = $CategorieMenuManager->get($id)->sous_categories();
                            $sous_categories = []; ?>
                        <div class="laCarte_item js-collapse-wrapper">
                            <h2 class="laCarte_item_button js-collapse">
                                <span class="h2 text"><?=$categories_menu_name_list[$id];?></span>
                                <span class="icon">
                                    <?php include "img/svg/plus-carte.svg"; ?>
                                </span>
                            </h2>
                            <div class="laCarte_item_content js-collapse-content">
                                <!-- AFFICHAGE PLATS -->
                                <!-- Si la catégorie contient des plats, on les affiche -->
                                <?php if ($plats_serialized != NULL) {
                                    // Récupération des plats appartenant à la catégorie
                                    foreach ($plats_serialized as $key => $id2) {
                                        $plats[] = $PlatManager->get($id2);
                                    }; 
                                ?>
                                <div class="plat">
                                    <?php  // Affichage données du plat 
                                        foreach($plats as $plat) {
                                    ?>
                                    <div class="laCarte_item_content_plat">
                                        <h3 class="plat_title">
                                            <span class="h4 vert title"><span class="text"><?=$plat->title();?></span>
                                                <span class="icon-drive"><img src="img/svg/picto-a-emporter.svg"
                                                        alt="picto-a-emporter"></span></span>
                                            <p class="vert subtitle"><?=$plat->descriptif();?></p>
                                        </h3>
                                        <div class="plat_price h4 vert">
                                            <?=$plat->price();?>€
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <?php } ?>

                                <!-- AFFICHAGE SOUS-CATEGORIE -->
                                <!-- Si la catégorie contient des sous-catégories, on les affiche -->
                                <?php  if ($sous_categories_serialized != NULL) {
                                    $count_sous_categories = count($sous_categories_serialized);
                                ?>
                                <div class="sous-menu <?php if($count_sous_categories % 2 != 0) { echo "last-full";}?>">
                                    <?php
                                        // Récupération des sous-catégories
                                        foreach ($sous_categories_serialized as $key => $id3) {
                                    ?>
                                    <div class="sous-menu_bloc">
                                        <h4 class="h4 rose uppercase sous-menu_title">
                                            <?=$categories_menu_name_list[$id3]?>
                                        </h4>
                                        <?php
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
                                        ?>
                                        <div class="laCarte_item_content_plat">
                                            <h3 class="plat_title">
                                                <span class="h4 vert title"><span
                                                        class="text"><?=$plat->title();?></span> <span
                                                        class="icon-drive"><img src="img/svg/picto-a-emporter.svg"
                                                            alt="picto-a-emporter"></span></span>
                                                <p class="vert subtitle"><?=$plat->descriptif();?></p>
                                            </h3>
                                            <div class="plat_price h4 vert">
                                                <?=$plat->price();?>€
                                            </div>
                                        </div>
                                        <?php 
                                            }
                                        }
                                        ?>
                                    </div>
                                    <?php } ?>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include 'includes/accelerateurs.php'; ?>
</section>

<?php include 'includes/footer.php'; ?>