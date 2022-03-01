<div class="c-reservez">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-10 col-md-offset-1 col-xl-8 col-xl-offset-2">
                <div class="c-reservez_content">
                    <?php $lisere_border = true; include "includes/lisere.php"; ?>
                    <div class="content">
                        <h3 class="h6 center rose uppercase content_title">Dans quel restaurant souhaitez-vous<br>
                            découvrir l’Italie ?</h3>
                        <div class="content_boutons">
                            <div>
                                <input id="foix" type="radio" name="reservation">
                                </input>
                                <label for="foix" class="bouton bg0-white-brRose-invers">
                                    <span>FOIX</span>
                                </label>
                            </div>
                            <div>
                                <input id="pamiers" type="radio" name="reservation">
                                </input>
                                <label for="pamiers" class="bouton bg0-white-brRose-invers">
                                    <span>PAMIERS</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c-reservez_bouton center">
                    <a href="<?php echo $NAV_restaurant_foix; ?>" title="<?php echo $NAV_TITLE_restaurant_foix; ?>"
                        class="bouton bg0-white-brRose">
                        <span>RÉSERVER</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <span class="forme-poivron">
        <img src="img/svg/poivron-vert.svg" alt="Poivron Doncamillo">
    </span>
    <span class="forme-huile">
        <img src="img/svg/huile-olive-vert.svg" alt="Huile olive Doncamillo">
    </span>
</div>