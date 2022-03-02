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
    <section class="rejoindre-poste beige-bg fixed-elem-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-5 col-xl-4 col-xl-offset-1">
                    <?php 
                        $count = 0;
                        // On parcours l'object array $recrutement dans le dossier datastore pour afficher chaque partie
                        foreach($recrutement as $item => $value) {
                            $count ++;
                    ?>
                    <div class="rejoindre-poste_etape etape-part" data-part="part-<?=$count?>">
                        <figure class="rejoindre-poste_etape_img anim-opacity woow" data-woow-toggle="true"
                            data-woow-offset="80">
                            <img src="img/content/rejoindre-famille/etapes/<?=$value->img_mobile?>" alt="">
                        </figure>
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
                            <p class="vert"><span><?=$text?></spa>
                            </p>
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
        <div class="rejoindre-poste_pizzas fixed-elem">
            <figure class="illustration-laurier">
                <img src="img/svg/romarin-beige-2.svg" alt="basilic Don Camillo">
            </figure>
            <figure class="illustration-roulette">
                <img src="img/svg/roulette-beige.svg" alt="Roulette Don Camillo">
            </figure>
            <div class="container">
                <dibv class="row">
                    <div class="col-xs-12 col-md-5 col-md-offset-6">
                        <div class="content">
                            <figure class="fond">
                                <img src="img/svg/rejoindre-la-famille/sticky-plateau.svg"
                                    alt="Plateau pizza Don Camillo">
                            </figure>
                            <?php 
                                $countImg = 0;
                                // On parcours l'object array $recrutement dans le dossier datastore pour afficher chaque partie
                                foreach($recrutement as $item => $value) {
                                    $countImg ++;
                            ?>
                            <figure class="img" data-part="part-<?=$countImg?>">
                                <img src="img/svg/rejoindre-la-famille/<?=$value->img?>" alt="<?=$value->title?>">
                            </figure>
                            <?php 
                                }
                            ?>
                        </div>
                    </div>
                </dibv>
            </div>
        </div>
    </section>
    <section class="rejoindre-storie vert-bg" id="storie">
        <span class="illustration anim-illustration woow parallax" data-css="transform" off-start="20" off-end="80"
            data-start="translateY(0%)" data-end="translateY(40%)" data-anchor="#storie" data-woow-offset="80">
            <img src="img/svg/plantes-vert.svg" alt="Burger Don Camillo">
        </span>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="h1 font semi-bold rose center rejoindre-storie_title anim-title woow"
                        data-woow-toggle="true" data-woow-offset="80">
                        <span>Don Camillo storie</span></h2>
                </div>
            </div>
            <div class="row row-flex">
                <div class="col-xs-12 col-md-4">
                    <div class="rejoindre-storie_item vert-fonce-bg anim-opacity anim-delay--1 woow"
                        data-woow-toggle="true" data-woow-offset="80">
                        <?php $lisere_border = false; include "includes/lisere.php"; ?>
                        <div>
                            <h3 class="h4 rose rejoindre-storie_item_title">
                                <span>Responsable de salle</span></h3>
                            <p class="blanc">« C’est une success story à l’italienne. D’abord runneuse au sein du
                                restaurant de Pamiers il y a tout juste deux ans, je suis devenue cheffe de rang après
                                quelques mois. Ma motivation a ensuite poussé l’équipe à me former pour que j’assure le
                                poste de responsable de salle. Aujourd’hui, j’ai eu l’opportunité de devenir la nouvelle
                                responsable de Don Camillo Foix. »</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <div class="rejoindre-storie_item vert-fonce-bg anim-opacity anim-delay--2 woow"
                        data-woow-toggle="true" data-woow-offset="80">
                        <?php $lisere_border = false; include "includes/lisere.php"; ?>
                        <div>
                            <h3 class="h4 rose rejoindre-storie_item_title">
                                <span>Second de cuisine</span></h3>
                            <p class="blanc">« Je suis l’un des plus anciens collaborateurs et j’ai eu la chance de
                                connaître une belle évolution. D’abord apprenti dans les cuisines de Pamiers il y a six
                                ans, je suis aujourd’hui considéré comme le couteau suisse du restaurant et les
                                pâtisseries, pizzas, sauces et grillades passent entre mes mains. Étant très rigoureux,
                                l’équipe m’a fait confiance pour avoir l’œil sur toutes les DLC de Don Camillo Pamiers.
                                »</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <div class="rejoindre-storie_item vert-fonce-bg anim-opacity anim-delay--3 woow"
                        data-woow-toggle="true" data-woow-offset="80">
                        <?php $lisere_border = false; include "includes/lisere.php"; ?>
                        <div>
                            <h3 class="h4 rose rejoindre-storie_item_title">
                                <span>Chef de rang</span></h3>
                            <p class="blanc">« Fraîchement arrivé à la suite d’un BTS il y a deux ans, j’ai très
                                rapidement fait mes preuves et évolué au sein des différents services. Au sein du
                                restaurant, j’ai tour à tour assuré les postes de serveur, barman et chef de rang.
                                Aujourd’hui, je suis le responsable de salle du restaurant de Pamiers. »</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="rejoindre-storie_bouton center anim-opacity woow" data-woow-toggle="true"
                        data-woow-offset="90">
                        <a href="" class="bouton bg0-white-brRose">
                            <span>Rejoignez la famille</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="rejoindre-contact beige-bg" id="contact">
        <span class="illustration anim-illustration woow parallax" data-css="transform" off-start="20" off-end="80"
            data-start="translateY(0%)" data-end="translateY(40%)" data-anchor="#contact" data-woow-offset="80">
            <img src="img/svg/tomate-coeur-de-boeuf-beige.svg" alt="Tomate Don Camillo">
        </span>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="h3 rose center rejoindre-contact_title anim-title woow" data-woow-toggle="true"
                        data-woow-offset="80">
                        <span>Contactez un de nos<br> restaurants</span></h2>
                </div>
            </div>
        </div>
        <form class="c-formulaire js-form-checker anim-opacity woow" data-woow-toggle="true" data-woow-offset="80"
            action="form/form-mail-contact.php" method="post" id="form-recrutement"
            style="--colorForm:#455033; --borderForm:#E39077;">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-5 col-md-offset-1 col-xl-4 col-xl-offset-2">
                        <div class="c-formulaire_field">
                            <p class="subtitle">Nom et prénom*</p>
                            <input name="required_alpha_Nom-Prénom" data-required="Merci d'indiquer votre nom et prénom"
                                placeholder="" type="text">
                        </div>
                        <div class="c-formulaire_field">
                            <p class="subtitle">Email*</p>
                            <input name="required_email_Email" data-required="Merci d'indiquer votre email"
                                placeholder="" type="email">
                        </div>
                        <div class="c-formulaire_field">
                            <p class="subtitle">Téléphone</p>
                            <input name="phone_Téléphone" data-required="" placeholder="" type="text">
                        </div>
                        <div class="c-formulaire_field">
                            <p class="subtitle">Choisissez votre restaurant*</p>
                            <div class="dropdown-toggle">
                                <input type="hidden" value=""
                                    data-required="Merci de sélectionner l'objet de votre demande"
                                    name="required_Restaurant" />
                                <button class="dropdown-toggle-btn">
                                    <span class="txt"><span class="icon-cursor"></span>
                                </button>
                                <ul class="dropdown">
                                    <?php foreach ($restaurants as $ville) {?>
                                    <li><button data-value="<?=$ville["name"];?>"><?=$ville["name"];?></button></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-5 col-xl-4">
                        <div class="c-formulaire_field">
                            <p class="subtitle">Le poste souhaité</p>
                            <div class="dropdown-toggle">
                                <input type="hidden" value=""
                                    data-required="Merci de sélectionner l'objet de votre poste" name="Poste" />
                                <button class="dropdown-toggle-btn">
                                    <span class="txt"></span><span class="icon-cursor"></span>
                                </button>
                                <ul class="dropdown">
                                    <?php foreach ($recrutement as $item => $poste) {?>
                                    <li><button data-value="<?=$poste->title;?>"><?=$poste->title;?></button></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="c-formulaire_field">
                            <p class="subtitle">Vous souhaitez nous en dire plus ? Dites nous tout !</p>
                            <textarea id="message" name="Message" placeholder=""
                                data-required="Merci de remplir votre message"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-5 col-md-offset-1 col-xl-4 col-xl-offset-2">
                        <div class="c-formulaire_field">
                            <div class="form-radio">
                                <input id="consentement" name="required_consentement"
                                    data-required="Vous devez cocher cette case pour pouvoir soumettre le formulaire"
                                    type="checkbox" value="Oui" /><label for="consentement">En soumettant ce formulaire,
                                    j'accepte que les données
                                    transmises soient exploitées par Don Camillo dans le cadre de ma prise de
                                    contact.</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-5 col-xl-4">
                        <input type="hidden" name="form" value="recrutement" />
                        <div class="c-formulaire_boutons">
                            <div class="c-formulaire_field c-formulaire_file">
                                <input name="required_file_CV" data-required="Merci de joindre votre CV." type="file"
                                    id="CV" accept=".doc,.docx,.pdf,.jpg,.jpeg,.png">
                                <label for="CV">
                                    <span>Joindre un cv</spa>
                                </label>
                            </div>
                            <button type="submit" class="bouton"><span>ENVOYER</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</section>

<?php include 'includes/footer.php'; ?>