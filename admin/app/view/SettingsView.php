<?php 
include 'includes/inc_header.php';
include 'includes/inc_main_sidebar.php';
include 'includes/inc_main_topbar.php';

// *** Récupération des données temporaires si elles existent

if(!empty($_SESSION['temp_data']))
{
    $site = new Site($_SESSION['temp_data']);
}

?>
<!-- start content  -->
<div class="row settings">
    <form id="enregistrer-settings" action="<?=SITE_ADMIN_BASE.'settings/edit/'?>" method="post" class="col-xs-12" enctype="multipart/form-data">
        <div class="page-title">
            <div class="title_left">
                <h3>Configuration</h3> </div>
            <div class="title_right">
                <div class="col-xs-12 form-group pull-right text-right">
                    <a href="" class="btn btn-danger">Annuler</a>
                    <button type="button" class="btn btn-success" data-form-checker>Enregistrer</button>
                </div>
            </div>
        </div>
        <!-- end header -->
        <!-- start Site informations -->
        <div class="row">
            <div class="col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Site <small>informations</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <!-- start content-->   
                        <div class="form-horizontal form-label-left">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    Nom du site <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-checker">
                                    <input type="text" name="required[alphanum][name]" required data-required="Vous devez renseigner un nom pour votre site" class="form-control col-md-7 col-xs-12" value="<?=$site->name()?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    Mail du site <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-checker">
                                    <input name="required[mail][email]" required data-required="Vous devez renseigner un email" class="form-control col-md-7 col-xs-12" type="mail" placeholder="contact@mon-super-site.com" value="<?=$site->email()?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    Nom de domaine du site <span class="required">*</span> 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-checker">
                                    <input type="text" name="required[alphanum][domain]" required data-required="Vous devez renseigner un nom de domaine" class="form-control col-md-7 col-xs-12" placeholder="mon-super-site.com" value="<?=$site->domain()?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    Url du site <span class="required">*</span> 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-checker">
                                    <input type="text" name="required[url][url]" required data-required="Vous devez renseigner une URL" class="form-control col-md-7 col-xs-12" placeholder="http://www.mon-super-site.com/" value="<?=$site->url()?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    Url de l'administration <span class="required">*</span> 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-checker">
                                    <input type="text" name="required[url][url_admin]" required data-required="Vous devez renseigner l'URL de l'admin du site" class="form-control col-md-7 col-xs-12" placeholder="http://www.mon-super-site.com/admin" value="<?=$site->url_admin()?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    Chemin de logo <span class="required">*</span> 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-checker">
                                    <input type="text" name="required[alphanum][srcimg]" required data-required="Vous devez renseigner une image" class="form-control col-md-7 col-xs-12" placeholder="../img/mon-image.png" value="<?=$site->srcimg()?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                 Couleur de fond logo <span class="required">*</span> 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-checker">
                                  <select class="form-control" name="required[colorimg]" required data-required="Vous devez choisir une couleur de fond">
                                    <option value="#2A3F54" <?=($site->colorimg() == '#2A3F54') ? "selected" : ""?>>Bleu initial</option>
                                    <option value="#FFFFFF" <?=($site->colorimg() == '#FFFFFF') ? "selected" : ""?>>Blanc</option>
                                    <option value="#243648" <?=($site->colorimg() == '#243648') ? "selected" : ""?>>Bleu sombre</option>
                                  </select>
                                </div>
                            </div>
                        </div>
                    <!-- end content--> 
                    </div>
                </div>
            </div>
        </div>
        <!-- end Site informations -->
    </form>
    <!-- end formm -->
</div>
<!-- end content  -->
<?php 
include 'includes/inc_main_bottombar.php'; 
include 'includes/inc_footer.php'; 
?>