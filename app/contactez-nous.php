<?php 
//VARIABLES
$PAGE_name = 'contact';
$HEADER_title = 'Contactez-nous';
$HEADER_subtitle = 'Restaurants DOn camillo';
//INCLUDE HELPER & HEADER

include 'includes/header.php';
?>
<section id="section-top">
    <section class="contact-content vert-bg" id="contact">
        <span class="illustration anim-illustration woow parallax" data-css="transform" off-start="20" off-end="80"
            data-start="translateY(0%)" data-end="translateY(40%)" data-anchor="#contact" data-woow-offset="80">
            <img src="img/svg/assiette-vert.svg" alt="Pizza Don Camillo">
        </span>
        <span class="illustration anim-illustration woow parallax" data-css="transform" off-start="20" off-end="80"
            data-start="translateY(0%)" data-end="translateY(-40%)" data-anchor="#contact" data-woow-offset="80">
            <img src="img/svg/antipasti-vert.svg" alt="Antipasti Don Camillo">
        </span>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="h3 rose center contact-content_title anim-title woow" data-woow-toggle="true"
                        data-woow-offset="80">
                        <span>Contactez un de nos<br> restaurants</span></h2>
                </div>
            </div>
        </div>
        <form class="c-formulaire js-form-checker anim-opacity woow" data-woow-toggle="true" data-woow-offset="80"
            action="form/form-mail-contact.php" method="post" id="form-contact"
            style="--colorForm:#F0E8DF; --borderForm:#E39077;">
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
                            <p class="subtitle">Objet</p>
                            <input name="required_alpha_Objet" data-required="Merci d'indiquer votre objet"
                                placeholder="" type="text">
                        </div>
                        <div class="c-formulaire_field">
                            <p class="subtitle">Nous sommes à votre écoute !</p>
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
                        <input type="hidden" name="form" value="contact" />
                        <div class="c-formulaire_boutons">
                            <button type="submit" class="bouton bg0-white-brRose"><span>ENVOYER</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <section class="contact-infos rose-bg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-4">
                    <div class="bloc">
                        <h2 class="h4 vert bloc_title">
                            <?php $city = "pamiers"; ?>
                            Don Camillo<br class="keep"> <?=$restaurants[$city]['name'];?>
                        </h2>
                        <div class="bloc_horaires">
                            <p class="blanc">À votre service tous les jours <br
                                    class="keep"><?=$restaurants[$city]['schedule'];?>
                            </p>
                        </div>
                        <div class="bloc_adresses">
                            <p class="blanc">
                                <?=$restaurants[$city]['adress'];?><br class="keep">
                                <?=$restaurants[$city]['cp'];?> <?=$restaurants[$city]['city'];?>
                            </p>
                        </div>
                        <div class="bloc_telephone">
                            <p class="blanc bold">
                                <a href="tel:<?=$restaurants[$city]['phone'];?>"
                                    class="no-link-desktop paragr center blanc bold"><?=$restaurants[$city]['phone'];?></a>
                            </p>
                        </div>
                    </div>
                    <div class="bloc_trait">
                        <div class="s-trait" style="--traitColor: #455033;">
                            <span><?php include "img/svg/tiret.svg";?></span></div>
                    </div>
                    <div class="bloc">
                        <h2 class="h4 vert bloc_title">
                            <?php $city = "foix"; ?>
                            Don Camillo<br class="keep"> <?=$restaurants[$city]['name'];?>
                        </h2>
                        <div class="bloc_horaires">
                            <p class="blanc">À votre service <?=$restaurants[$city]['schedule'];?>
                            </p>
                        </div>
                        <div class="bloc_adresses">
                            <p class="blanc">
                                <?=$restaurants[$city]['adress'];?><br class="keep">
                                <?=$restaurants[$city]['cp'];?> <?=$restaurants[$city]['city'];?>
                            </p>
                        </div>
                        <div class="bloc_telephone">
                            <p class="blanc bold">
                                <a href="tel:<?=$restaurants[$city]['phone'];?>"
                                    class="no-link-desktop paragr center blanc bold"><?=$restaurants[$city]['phone'];?></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="map-restaurant" class="map-restaurant"></div>
    </section>
</section>

<?php include 'includes/footer.php'; ?>