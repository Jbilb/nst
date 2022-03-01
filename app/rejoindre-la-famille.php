<?php 
//VARIABLES
$PAGE_name = 'page_rejoindre';
$HEADER_title = 'REJOINDRE LA FAMILLE';
$HEADER_subtitle = 'Bienvenue chez DOn camillo';
//INCLUDE HELPER & HEADER

include 'includes/header.php'; 
?>

<section id="section-top">
    <section class="c-aside vert-bg" id="recrutement">
        <span class="illustration anim-illustration woow parallax" data-css="transform" off-start="20" off-end="80"
            data-start="translateY(0%)" data-end="translateY(40%)" data-anchor="#recrutement" data-woow-offset="80">
            <img src="img/svg/basilic-vert.svg" alt="Burger Don Camillo">
        </span>
        <div class="container">
            <div class="row row-flex">
                <div class="col-xs-12 col-md-4 col-md-offset-1">
                    <h3 class="h3 rose anim-title woow" data-woow-toggle="true" data-woow-offset="80"><span>Nous
                            recrutons !</span></h3>
                    <div class="s-trait v-margeTitre anim-tiret woow" data-woow-toggle="true" data-woow-offset="80"
                        style="--traitColor: #E39077;"><span><?php include "img/svg/tiret.svg";?></span></div>
                    <p class="beige anim-opacity woow" data-woow-toggle="true" data-woow-offset="70">Chez Don Camillo,
                        nos collaborateurs, c’est notre famille. C’est dans cette optique que nous prenons soin de
                        chaque membre de notre équipe. Pour cela, nous mettons tout en œuvre pour offrir un confort de
                        travail maximal. Ambiance conviviale, accompagnement spécifique, matériel neuf et badgeuse pour
                        ne pas laisser filer les heures supplémentaires, sont les ingrédients principaux pour servir des
                        bons plats dans une atmosphère chaleureuse.</p>
                    <p class="beige semi-bold anim-opacity woow" data-woow-toggle="true" data-woow-offset="70">Vous êtes
                        dynamique, passioné·e, accueillant·e et volontaire ? Benvenuto
                        !</p>
                </div>
                <div class="col-xs-12 col-md-5 col-md-offset-1">
                    <figure class="img anim-img-parallax" id="img1">
                        <img width="375" height="385" class="parallax speedImg" data-css="transform"
                            data-start="translateY(-5%)" data-end="translateY(0%)" data-anchor="#img1"
                            src="img/content/rejoindre-famille/rejoindre-famille-don-camillo.jpg"
                            alt="Rejoindre Don Camillo">
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <section class="rejoindre-poste beige-bg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-5 col-xl-4 col-xl-offset-1">
                    <?php 
                        $count = 0;
                        // On parcours l'object array $recrutement dans le dossier datastore pour afficher chaque partie
                        foreach($recrutement as $item => $value) {
                            $count ++;
                    ?>
                    <div class="rejoindre-poste_etape">
                        <h2 class="h1 font semi-bold rose rejoindre-poste_etape_title anim-title woow"
                            data-woow-toggle="true" data-woow-offset="80"><span><?=$value->title?></span></h2>
                        <p class="vert semi-bold rejoindre-poste_etape_subtitle anim-opacity woow"
                            data-woow-toggle="true" data-woow-offset="70"><?=$value->subtitle?></p>
                        <div class="paragr-list anim-opacity woow" data-woow-toggle="true" data-woow-offset="70">
                            <?php
                            // On parcours la liste dans l'object pour afficher la liste
                                $arrayList = $value->list;
                                foreach ($arrayList as $list => $text) {
                            ?>
                            <p class="vert"><?=$text?></p>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <?php 
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
</section>

<?php include 'includes/footer.php'; ?>