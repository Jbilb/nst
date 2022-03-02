<?php 
//VARIABLES
$PAGE_name = 'restaurant_pamiers';
$HEADER_title = 'Don camillo pamierS';
$HEADER_subtitle = 'Goûtez à la dolce vita';
//INCLUDE HELPER & HEADER

$city = "pamiers";

include 'includes/header.php';
?>
<section id="section-top">
    <section class="c-aside beige-bg" id="horaires">
        <span class="illustration-tomate anim-illustration woow parallax" data-css="transform" off-start="20"
            off-end="80" data-start="translateY(0%)" data-end="translateY(40%)" data-anchor="#horaires"
            data-woow-offset="80">
            <img src="img/svg/tomate-beige.svg" alt="Tomate Don Camillo">
        </span>
        <span class="illustration-huile anim-illustration woow parallax" data-css="transform" off-start="20"
            off-end="80" data-start="translateY(0%)" data-end="translateY(-40%)" data-anchor="#horaires"
            data-woow-offset="80">
            <img src="img/svg/huile-olive.svg" alt="Huile olive Don Camillo">
        </span>
        <div class="container">
            <div class="row row-flex">
                <div class="col-xs-12 col-md-4 col-md-offset-2">
                    <h3 class="h3 rose anim-title woow" data-woow-toggle="true" data-woow-offset="80"><span>Nous sommes
                            impatients de vous servir</span></h3>
                    <div class="s-trait v-margeTitre anim-tiret woow" data-woow-toggle="true" data-woow-offset="80"
                        style="--traitColor: #E39077;"><span><?php include "img/svg/tiret.svg";?></span></div>
                    <p class="vert anim-opacity woow" data-woow-toggle="true" data-woow-offset="70">Soyez les bienvenus
                        dans notre premier restaurant !<br>
                        Passez le seuil de notre porte et voyagez, tout simplement. Nous avons à cœur de vous offrir un
                        lieu chaleureux pour passer un moment de détente en famille, entre amis ou entre collègues.</p>
                </div>
                <div class="col-xs-12 col-md-5 col-md-offset-1 col-xl-4 col-xl-offset-1">
                    <div class="c-aside_horaires vert-bg anim-opacity woow" data-woow-toggle="true"
                        data-woow-offset="80">
                        <?php $lisere_border = false; include "includes/lisere.php"; ?>
                        <div class="content">
                            <h2 class="h3 rose center content_title">Nous vous<br> attendons ! </h2>
                            <div class="content_bloc">
                                <p class="beige center"><?=$restaurants[$city]['schedule'];?></p>
                            </div>
                            <div class="content_bloc">
                                <p class="semi-bold beige center">Passez vos commandes à emporter</p>
                                <p class="beige center">À partir de 10h30</p>
                            </div>
                            <div class="content_bloc center">
                                <p class="semi-bold beige center">Appelez notre équipe</p>
                                <a href="<?=$restaurants[$city]['phone'];?>"
                                    class="beige center paragr no-link-desktop"><?=$restaurants[$city]['phone'];?></a>
                            </div>
                            <div class="content_bloc">
                                <p class="semi-bold beige center">Adresse</p>
                                <p class="beige center"> <?=$restaurants[$city]['adress'];?>
                                    <br><?=$restaurants[$city]['cp'];?> <?=$restaurants[$city]['city'];?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="restaurant-bg">
        <div class="img anim-img-parallax" id="img1">
            <img class="parallax speedImg" data-anchor="#img1" data-css="transform" data-start="translateY(-5%)"
                data-end="translateY(0%)" width="261" height="388" src="img/content/villes/<?=$city?>/bg-intro.jpg"
                alt="pizzas-italiennes-don-camillo">
        </div>
    </section>
    <section class="restaurant-desc vert-bg" id="description">
        <span class="illustration anim-illustration woow parallax" data-css="transform" off-start="20" off-end="80"
            data-start="translateY(0%)" data-end="translateY(40%)" data-anchor="#description" data-woow-offset="80">
            <img src="img/svg/branche-basilic-vert.svg" alt="Raisin Don Camillo">
        </span>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="h3 rose center anim-title woow" data-woow-toggle="true" data-woow-offset="80"><span>Même
                            à pamiers,
                        </span><br> <span>la dolce vita, c’est sacré !</span></h3>
                    <div class="s-trait v-margeTitre v-center anim-tiret woow" data-woow-toggle="true"
                        data-woow-offset="80" style="--traitColor: #E39077;">
                        <span><?php include "img/svg/tiret.svg";?></span></div>
                    <p class="beige center v-maxWidth anim-opacity woow" data-woow-toggle="true" data-woow-offset="70"
                        style="--pMaxWith: 35vw;">Profitez d’un moment de détente confortablement installé·e sur notre
                        magnifique rooftop : la Dolce Vita. Notre toit-terrasse vous accueille pour vos repas en
                        amoureux, en famille ou en groupe* pour célébrer tous types d’événements. Une chose est sûre,
                        vous n’aurez plus envie de la quitter.</p>
                    <p class="beige center v-maxWidth anim-opacity woow" data-woow-toggle="true" data-woow-offset="70"
                        style="--pMaxWith: 35vw;">Envie de réserver la Dolce Vita ? Pour les groupes de moins de six
                        personnes, réservez en ligne en nous le précisant en commentaire. Pour les groupes de plus de
                        six, passez-nous un coup de téléphone ! </p>
                    <p class="beige paragr-verySmall center v-maxWidth anim-opacity woow" data-woow-toggle="true"
                        data-woow-offset="70" style="--pMaxWith: 35vw;">*Dolce Vita privatisable à partir de 25
                        personnes : passez-nous un coup de téléphone !
                    </p>
                    <div class="container-bouton center anim-opacity woow" data-woow-toggle="true"
                        data-woow-offset="70">
                        <a href="" class="p-nav_content_bouton bouton bg0-white-brRose">
                            <span>RÉSERVEZ</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <article class="c-blocText vert-bg" id="pizza1">
        <div class="content-bot">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-4 col-md-offset-8">
                        <h3 class="h3 rose content-bot_title anim-title woow" data-woow-toggle="true"
                            data-woow-offset="80">
                            <span>Les Pizzas, Il n’y a pas </span><br> <span>d’heure pour les déguster !</span></h3>
                        <p class="blanc semi-bold anim-opacity woow" data-woow-toggle="true" data-woow-offset="80">
                            Retrouvez notre distributeur de pizzas disponibles 24H/24 et 7J/7 !
                        </p>
                        <p class="beige v-maxWidth anim-opacity woow" data-woow-toggle="true" data-woow-offset="70">Les
                            pizzas à emporter sont préparées le matin même et précuites dans notre restaurant de Pamiers
                            avant d’être déposées dans notre distributeur. Patientez seulement 3 minutes pour déguster
                            immédiatement votre pizza ou récupérez votre pizza précuite et terminez sa cuisson à la
                            maison.</p>
                    </div>
                </div>
            </div>
            <figure class="img posi-left anim-img-parallax" id="img3">
                <img class="parallax speedImg" data-css="transform" data-start="translateY(-5%)"
                    data-end="translateY(0%)" data-anchor="#img3" width="340" height="245"
                    src="img/content/villes/<?=$city?>/pizza-don-camillo.jpg" alt="Pizzas, pâtes ou encore gnocchi">
            </figure>
        </div>
    </article>
    <article class="c-blocText rose-bg" id="pizza2">
        <span class="illustration-pizza anim-illustration woow parallax" data-css="transform" off-start="-10"
            off-end="80" data-start="translateY(0%)" data-end="translateY(50%)" data-anchor="#pizza2"
            data-woow-offset="80">
            <img src="img/svg/pizzas-rose.svg" alt="Burger Don Camillo">
        </span>
        <div class="content-bot">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <h3 class="h3 vert content-bot_title anim-title woow" data-woow-toggle="true"
                            data-woow-offset="80">
                            <span>L’italie sur place</span><br> <span>ou à emporter</span></h3>
                        <p class="beige anim-opacity woow" data-woow-toggle="true" data-woow-offset="80">
                            Découvrez toutes les recettes du restaurant Don Camillo Pamiers sur place ou depuis votre
                            salle à manger. Parce que la qualité et le goût sont primordiaux chez nous, certains de nos
                            plats ne sont pas disponibles à emporter, aussi délicieux soient-ils.
                        </p>
                        <p class="beige semi-bold v-maxWidth anim-opacity woow" data-woow-toggle="true"
                            data-woow-offset="70">
                            Consultez notre carte pour connaître notre sélection de plats à emporter.</p>
                        <div class="container-bouton anim-opacity woow" data-woow-toggle="true" data-woow-offset="70">
                            <a href="" class="p-nav_content_bouton bouton bg0-white-brvert">
                                <span>LA CARTE</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="img posi-right anim-img-parallax" id="img5">
                <img class="parallax speedImg" data-css="transform" data-start="translateY(-5%)"
                    data-end="translateY(0%)" data-anchor="#img5" width="340" height="245"
                    src="img/content/villes/<?=$city?>/sur-place-emporter.jpg" alt="sur-place-emporter">
            </div>
        </div>
        <figure class="bg-img anim-img-parallax" id="bgImg">
            <img class="parallax speedImg" data-css="transform" data-start="translateY(-5%)" data-end="translateY(0%)"
                data-anchor="#bgImg" width="375" height="705" src="img/content/villes/<?=$city?>/bg-end.jpg"
                alt="Pizzas italiennes">
        </figure>
    </article>
</section>

<?php include 'includes/footer.php'; ?>