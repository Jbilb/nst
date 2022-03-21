<?php 
include 'includes/inc_header.php';
include 'includes/inc_main_sidebar.php';
include 'includes/inc_main_topbar.php';
?>
<!-- start content  -->
<div class="row actualite">
    <form action="plats/<?=$action?>" method="post" class="col-xs-12">
        <div class="page-title">
            <div class="title_left">
                <h3><?=$title?></h3>
            </div>
            <div class="title_right">
                <div class="form-group pull-right text-right">
                    <a href="plats/" class="btn btn-danger">Annuler</a>
                    <button type="button" class="btn btn-success" data-form-checker>Enregistrer</button>
                </div>
            </div>
        </div>
        <!-- end header -->
        <div class="row">
            <!-- start Admin -->
            <div class="col-xs-12">
                <div class="x_panel row">
                    <div class="col-xs-12 col-sm-6 col-lg-5">
                        <!-- start content-->
                        <div class="form-group form-checker">
                            <label>Nom du plat :</label>
                            <input class="form-control" placeholder="Entrez le nom du plat :" type="text"
                                value="<?=$plat->title()?>" name="required[alphanum][title]"
                                data-required="Vous devez entrez un nom" required>
                        </div>
                        <div class="form-group form-checker">
                            <label>Description du plat :</label>
                            <input class="form-control" placeholder="Entrez la description du plat :" type="text"
                                value="<?=$plat->descriptif()?>" name="descriptif"
                                data-required="Vous devez entrez une description">
                        </div>
                        <div class="form-group form-checker">
                            <label>Prix :</label>
                            <input class="form-control" placeholder="Entrez le prix :" type="text"
                                value="<?=$plat->price()?>" name="price" data-required="Vous devez entrez un prix">
                        </div>
                        <div class="form-group">
                            <label>Ce plat est disponible à la vente à emporter</label><br>
                            <strong>Non</strong>&nbsp;&nbsp;
                            <label class="switch">
                                <input type="checkbox" name="is_takeaway" value="1"
                                    <?=($plat->is_takeaway()) ? "checked" : ""?> />
                                <span class="slider"></span>
                            </label>
                            &nbsp;&nbsp;<strong>Oui</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- end content  -->
<?php 
include 'includes/inc_main_bottombar.php'; 
include 'includes/inc_footer.php'; 
?>