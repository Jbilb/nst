<?php 
include 'includes/inc_header.php';
include 'includes/inc_main_sidebar.php';
include 'includes/inc_main_topbar.php';

?>
<!-- start content  -->
<div class="row actualite">
    <form id="enregistrer-offre" action="menu/<?=$action?>" method="post" class="col-xs-12" enctype="multipart/form-data">
        <div class="page-title">
            <div class="title_left">
                <h3><?=$title?></h3> 
            </div>
            <div class="title_right">
                <div class="form-group pull-right text-right"> 
                    <a href="articles/" class="btn btn-danger">Annuler</a>
                    <button type="button" class="btn btn-success" data-form-checker>Enregistrer</button>
                </div>
            </div>
        </div>
        <!-- end header -->
        <div class="row">
            <!-- start Admin -->
            <div class="col-xs-12">
                <div class="x_panel row"> 
                    <!-- Page builder -->
                    <div class="col-xs-12">
                        <h3 class="category_title"><strong>CONSTRUCTION DU CORPS DU MENU</strong></h3>
                    </div>
                    
                    <div class="clearfix"></div>
                    <div class="col-xs-12">
                        <hr>
                    </div>
                    <div class="col-xs-12 sortable" id="articleBody">
                        <?php 
                            if(!empty($menu_body)) 
                            {
                                foreach($menu_body as $key => $element)
                                {
                                    foreach($element as $index => $value)
                                    if($index === 'categories_menu') {
                        ?>
                        <div class="article-item ui-state-default form-group">
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-8">
                                    <div class="form-group form-checker">
                                        <label><?=$list_name_categories_menu[$value];?></label>
                                        <input type="text" name="categories_menu[]" class="content hidden" value="<?=$value;?>"> 
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-sm-offset-1 item-edition">
                                    <span class="bouton delete"><span class="fa fa-trash"></span></span>
                                    <span class="bouton move"><span class="fa fa-arrows"></span></span>
                                </div>
                            </div>
                        </div>
                        <?php
                                    }  
                                }
                            }
                        ?>
                    </div>
                    
                    <!-- / Page builder -->
                    
                    <div class="col-xs-12">
                        <hr>
                    </div>
                    <div class="col-xs-12 buttons-edition-article">
                        <h4>Ajouter une catégorie au menu</h4>
                        <br/>
                        <?php 
                            if(!empty($list_categories_menu)) 
                            {
                                foreach($list_categories_menu as $categorie_menu)
                                {
                        ?>
                            <button type="button" class="btn btn-success articleAddItem" data-target="modele_<?=$categorie_menu->id_categorie_menu();?>" data-type="text">
                                <b><?=$categorie_menu->name();?></b>
                            </button>&nbsp;&nbsp;
                        <?php  
                                }
                            }
                        ?>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group pull-right text-right"> 
                            <a href="articles/" class="btn btn-danger">Annuler</a>
                            <button type="button" class="btn btn-success" data-form-checker>Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </form>
</div>

<!-- CONTENT OF PAGE ELEMENTS -->
<?php 
    if(!empty($list_categories_menu)) 
    {
        foreach($list_categories_menu as $categorie_menu)
        {
    ?>
<div id="modele_<?=$categorie_menu->id_categorie_menu();?>" class="article-item ui-state-default form-group hidden">
    <div class="form-group row">
        <div class="col-xs-12 col-sm-8">
            <div class="form-group form-checker">
                <label><?=$categorie_menu->name();?></label>
                <input type="text" name="categories_menu[]" class="content hidden" value="<?=$categorie_menu->id_categorie_menu();?>">    
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-sm-offset-1 item-edition">
            <span class="bouton delete"><span class="fa fa-trash"></span></span>
            <span class="bouton move"><span class="fa fa-arrows"></span></span>
        </div>
    </div>
</div>
<?php  
        }
    }
    else {

?>
<p>
    Vous devez ajouter des catégories dans l'onglet "Catégories de menu" avant de pouvoir construire le corps du menu.
</p>
<?php  
    }
?>

<!-- end content  -->
<?php 
include 'includes/inc_main_bottombar.php'; 
include 'includes/inc_footer.php'; 
?>