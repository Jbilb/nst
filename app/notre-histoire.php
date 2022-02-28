<?php 
//VARIABLES
$PAGE_name = 'page_histoire';
$HEADER_title = 'Une histoire familiale';
$HEADER_subtitle = 'depuis 1994';
//INCLUDE HELPER & HEADER

include 'includes/header.php'; 
?>

<section id="section-top">
    <section class="histoire-intro" id="intro-histoire">
        <span class="illustration anim-illustration woow parallax" data-css="transform" off-start="20" off-end="80"
            data-start="translateY(0%)" data-end="translateY(50%)" data-anchor="#intro-histoire" data-woow-offset="80">
            <img src="img/svg/basilic-beige.svg" alt="Basilic Don Camillo">
        </span>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="h3 rose center anim-title woow" data-woow-toggle="true" data-woow-offset="80"><span>Notre
                            histoire, notre fierté</span></h2>
                    <div class="s-trait v-margeTitre v-center anim-tiret woow" data-woow-toggle="true"
                        data-woow-offset="80" style="--traitColor: #E39077;"><span></span></div>
                    <div class="row">
                        <div class="col-xs-12 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
                            <p class="center vert anim-opacity woow" data-woow-toggle="true" data-woow-offset="70">
                                Tout a commencé quand notre père Joël, alors qu’il avait à peine 14 ans, a pris la
                                décision d’arrêter ses études pour se consacrer à sa véritable passion : la cuisine.
                                Nous sommes ainsi nés directement dans les cuisines du premier restaurant de nos
                                parents,
                                au milieu de la farine, des poêles et des casseroles.
                            </p>
                            <p class="center vert anim-opacity woow" data-woow-toggle="true" data-woow-offset="70">
                                Il y a quelques années, nous sommes partis en famille sillonner les belles régions
                                d’Italie, pour déceler tous les secrets des recettes du terroir. C’est à l’arrière de
                                notre camping-car que nous avons commencé à prendre des notes sur la véritable recette
                                des pâtes fraîches, des gnocchis ou encore de la pizza napolitaine et son inimitable
                                sauce tomate.
                            </p>
                            <p class="center vert anim-opacity woow" data-woow-toggle="true" data-woow-offset="70">
                                Au fond, nous étions destinés à reprendre le fourneau.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <article class="c-sliderEtapes vert-bg">
        <div class="c-sliderEtapes_carre">
            <div class="container">
                <div class="row row-flex">
                    <div class="col-xs-12 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3 anim-opacity woow"
                        data-woow-toggle="true" data-woow-offset="80">
                        <div class="c-sliderEtapes_carre_etapes" dots-etapes data-etapes="1991, 1994, 2022"
                            data-mobile="150"></div>
                        <div class="c-sliderEtapes_carre_slider" slider-etapes>
                            <div class="slides">
                                <div class="c-sliderEtapes_carre_slider_content">
                                    <div class="number-left rose">1991</div>
                                    <div class="separateur"><span
                                            class="trait"><span><?php include "img/svg/tiret-vertical.svg";?></span></span>
                                    </div>
                                    <p class="blanc h3 text">Ouverture de notre toute première pizzeria</p>
                                </div>
                            </div>
                            <div class="slides">
                                <div class="c-sliderEtapes_carre_slider_content">
                                    <div class="number-left rose">1994</div>
                                    <div class="separateur"><span
                                            class="trait"><span><?php include "img/svg/tiret-vertical.svg";?></span></span>
                                    </div>
                                    <p class="blanc h3 text">Ouverture de la trattoria Don Camillo Pamiers</p>
                                </div>
                            </div>
                            <div class="slides">
                                <div class="c-sliderEtapes_carre_slider_content">
                                    <div class="number-left rose">2022</div>
                                    <div class="separateur"><span
                                            class="trait"><span><?php include "img/svg/tiret-vertical.svg";?></span></span>
                                    </div>
                                    <p class="blanc h3 text">Ouverture de notre deuxième trattoria Don Camillo Foix
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <section class="histoire-passion vert-bg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-4 col-md-offset-1">
                    <h3 class="h3 rose anim-title woow" data-woow-toggle="true" data-woow-offset="80"><span>La passion
                            de la</span><br> <span>cuisine, notre héritage</span></h3>
                    <div class="s-trait v-margeTitre anim-tiret woow" data-woow-toggle="true" data-woow-offset="80"
                        style="--traitColor: #E39077;"><span><?php include "img/svg/tiret.svg";?></span></div>
                    <p class="beige v-maxWidth anim-opacity woow" data-woow-toggle="true" data-woow-offset="70"
                        style="--pMaxWith: 42rem;">Si une maison a besoin de quatre murs pour tenir, ce sont les quatre
                        membres de notre famille qui sont la genèse de nos restaurants.</p>
                    <p class="beige v-maxWidth anim-opacity woow" data-woow-toggle="true" data-woow-offset="70"
                        style="--pMaxWith: 42rem;">Depuis notre enfance, nous sommes aux premières loges dans la cuisine
                        familiale. L’engagement de
                        nos parents et leur goût du travail bien fait sont des valeurs ancrées dans notre ADN.</p>
                    <p class="beige v-maxWidth anim-opacity woow" data-woow-toggle="true" data-woow-offset="70"
                        style="--pMaxWith: 42rem;">Aujourd’hui, c’est grâce à leur amour et leurs enseignements qu’un
                        véritable savoir-faire se
                        retrouve dans chacun de nos plats.</p>
                </div>
                <div class="col-xs-12 col-md-6">
                    <figure class="img posi-right anim-img-parallax" id="img1">
                        <img class="parallax speedImg" data-css="transform" data-start="translateY(-5%)"
                            data-end="translateY(0%)" data-anchor="#img1" width="340" height="580"
                            src="img/content/histoire/passion-cuisine-don-camillo.jpg"
                            alt="passion-cuisine-don-camillo">
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <article class="c-blocText vert-bg" id="equipe">
        <span class="illustration-artichaud anim-illustration woow parallax" data-css="transform" off-start="20"
            off-end="80" data-start="translateY(0%)" data-end="translateY(50%)" data-anchor="#equipe"
            data-woow-offset="80">
            <img src="img/svg/artichaud-vert.svg" alt="Equipe Don Camillo">
        </span>
        <div class="content-bot">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-3 col-md-offset-9">
                        <h3 class="h3 rose right anim-title woow" data-woow-toggle="true" data-woow-offset="80">
                            <span>« De
                                l’amour et de la rigueur, la voilà la recette du bonheur. »</span></h3>
                        <p class="blanc right semi-bold anim-opacity woow" data-woow-toggle="true"
                            data-woow-offset="80">Joël
                            & Marie-José Palmerio
                        </p>
                    </div>
                </div>
            </div>
            <figure class="img posi-left anim-img-parallax" id="img3">
                <img class="parallax speedImg" data-css="transform" data-start="translateY(-5%)"
                    data-end="translateY(0%)" data-anchor="#img3" width="340" height="245"
                    src="img/content/histoire/amour-rigueur-recette-bonheur.jpg" alt="Pizzas, pâtes ou encore gnocchi">
            </figure>
        </div>
    </article>
    <article class="c-blocText rose-bg" id="equipe2">
        <span class="illustration-tomate anim-illustration woow parallax" data-css="transform" off-start="20"
            off-end="80" data-start="translateY(0%)" data-end="translateY(50%)" data-anchor="#equipe2"
            data-woow-offset="80">
            <img src="img/svg/raviolis-rose.svg" alt="Burger Don Camillo">
        </span>
        <div class="content-bot">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-3">
                        <h3 class="h3 vert anim-title woow" data-woow-toggle="true" data-woow-offset="80"><span>« On
                                dit toujours que comme Obélix, on est tombés dans la farine quand on était petits. »
                            </span></h3>
                        <p class="blanc semi-bold anim-opacity woow" data-woow-toggle="true" data-woow-offset="80">
                            Gianni &
                            Lorenzo
                        </p>
                    </div>
                </div>
            </div>
            <div class="img posi-right anim-img-parallax" id="img5">
                <img class="parallax speedImg" data-css="transform" data-start="translateY(-5%)"
                    data-end="translateY(0%)" data-anchor="#img5" width="340" height="245"
                    src="img/content/histoire/gianni-lorenzo.jpg" alt="Gianni & Lorenzo">
            </div>
        </div>
        <figure class="bg-img anim-img-parallax" id="bgImg">
            <img class="parallax speedImg" data-css="transform" data-start="translateY(-5%)" data-end="translateY(0%)"
                data-anchor="#bgImg" width="375" height="705" src="img/content/histoire/pizzas-don-camillo.jpg"
                alt="Pizzas italiennes">
        </figure>
    </article>
    <?php include 'includes/accelerateurs.php'; ?>
</section>

<?php include 'includes/footer.php'; ?>