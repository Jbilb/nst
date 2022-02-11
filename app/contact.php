<?php 
//VARIABLES
$PAGE_name = 'contact';
$HEADER_title = 'CONTACT';
//INCLUDE HELPER & HEADER

include 'includes/header.php';
?>
<section id="section-top">
    <section class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                <form class="c-formulaire js-form-checker" action="form/form-mail-contact.php" method="post" id="form-contact">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="c-formulaire_field">
                                Votre demande concerne : 
                                <div class="dropdown-toggle">
                                    <input type="hidden" value="" data-required="Merci de sélectionner l'objet de votre demande" name="required_Demande"/>
                                    <button class="dropdown-toggle-btn">
                                       <span class="txt">Votre demande concerne</span> <span class="icon-cursor"></span>
                                    </button>
                                    <ul class="dropdown">
                                        <li><button data-value="Devis">Demande de devis</button></li>
                                        <li><button data-value="Recrutement">Recrutement</button></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="c-formulaire_field">
                                <input name="required_alpha_Nom" data-required="Merci d'indiquer votre nom." placeholder="Nom * :" type="text">
                            </div>
                            <div class="c-formulaire_field">
                                <input name="required_alpha_Prénom" data-required="Merci d'indiquer votre prénom." placeholder="Prénom * :" type="text">
                            </div>
                            <div class="c-formulaire_field">
                                <input name="required_phone_Téléphone" data-required="Merci d'indiquer votre téléphone" placeholder="Téléphone * :" type="text">
                            </div>
                            <div class="c-formulaire_field">
                                <input name="required_email_Email" data-required="Merci d'indiquer votre email" placeholder="Email * :" type="email">
                            </div>
                            <div class="c-formulaire_field c-formulaire_file">
                                <input name="required_file_CV" data-required="Merci de joindre votre CV." type="file" id="CV" accept=".doc,.docx,.pdf,.jpg,.jpeg,.png">
                                <label for="CV">
                                    Joindre votre C.V.
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="c-formulaire_field">
                                <input name="required_alphanum_Sujet" data-required="Merci d'indiquer le sujet de votre mail" placeholder="Demande * :" type="text">
                            </div>
                            <div class="c-formulaire_field">
                                <textarea id="message" name="required_Message" placeholder="Message* :" data-required="Merci de remplir votre message"></textarea>
                            </div>
                            <div class="c-formulaire_field">
                                <div class="form-radio">
                                    <input id="consentement" name="required_consentement" data-required="Vous devez cocher cette case pour pouvoir soumettre le formulaire" type="checkbox" value="Oui"/><!--
                                 --><label for="consentement">En soumettant ce formulaire, j'accepte que les données transmises soient exploitées par NomDuClient dans le cadre de ma prise de contact.</label>
                                </div>
                            </div>
                            <input type="hidden" name="form" value="contact"/>
                            <button type="submit" class="bouton">ENVOYER</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</section>

<?php include 'includes/footer.php'; ?>
