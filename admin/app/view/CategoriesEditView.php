<?php 
include 'includes/inc_header.php';
include 'includes/inc_main_sidebar.php';
include 'includes/inc_main_topbar.php';
?>
<!-- start content  -->
<div class="row actualite">
    <form action="categories/<?=$action?>" method="post" class="col-xs-12">
        <div class="page-title">
            <div class="title_left">
                <h3><?=$title?></h3>  
            </div>
            <div class="title_right">
                <div class="form-group pull-right text-right"> 
                    <a href="categories/" class="btn btn-danger">Annuler</a>
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
                            <label>Nom de la catégorie :</label>
                            <input class="form-control" placeholder="Entrez le nom de la catégorie :" type="text" value="<?=$categorie->name()?>" name="required[alphanum][name]" data-required="Vous devez entrez un nom" required>
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