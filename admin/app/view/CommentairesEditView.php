<?php 
include 'includes/inc_header.php';
include 'includes/inc_main_sidebar.php';
include 'includes/inc_main_topbar.php';
$form_action = "index.php?page=commentaires&action=moderer&id=".$commentaire->id_commentaire();
?>
<!-- start content  -->
<div class="row actualite">
    <form id="enregistrer-article" action="commentaires/<?=$action?>" method="post" class="col-xs-12" enctype="multipart/form-data">
        <div class="page-title">
            <div class="title_left">
                <h3><?=$title?></h3> </div>
            <div class="title_right">
                <div class="form-group pull-right text-right"> 
                    <a href="commentaires/" class="btn btn-warning">RETOUR</a>
                    &nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-success" data-form-checker><i class="fa fa-check"></i> Valider ce commentaire</button>
                    <button id="<?=$commentaire->id_commentaire()?>" class="btn btn-danger delete-post" type="button" data-toggle="modal" data-target=".modal-delete"><i class="fa fa-trash-o"></i> Supprimer ce commentaire</button>
                </div>
            </div>
        </div>
        <!-- end header -->
        <div class="row">
            <!-- start Admin -->
            <div class="col-xs-12">
                <div class="x_panel row">
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <br/>
                        <h5>Auteur du commentaire :</h5>
                        <strong><?=$commentaire->name()?></strong>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <br/>
                        <h5>Date de publication :</h5>
                        <strong><?=$commentaire->date_publication()?></strong>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <br/>
                        <h5>Article concerné :</h5>
                        <strong><?=$article_name?></strong>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <br/>
                                <h5>Contenu du commentaire :</h5>
                                <blockquote>
                                    <strong><?=$commentaire->content()?></strong>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <hr>
                    </div>
                    <div class="col-xs-12">
                        <a href="mailto:<?=$commentaire->email()?>" class="btn btn-info">Contacter l'auteur par e-mail</a>
                    </div>
                </div>
            </div>
        </div>
      </form>
</div>

<!-- modal -->
<div class="modal fade modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
                <h4 class="modal-title" id="myModalLabel2">EFFACER</h4> </div>
            <div class="modal-body">
                <h4>Supprimer ce commentaire ?</h4>
                <p>
                    Vous êtes sur le point de supprimer ce commentaire.<br/>
                    <strong>Cette opération est irréversible.</strong><br/>
                    Souhaitez-vous continuer ?
                </p>
            </div>
            <form class="modal-footer" method="get" action="index.php">
                <input id="page" type="hidden" name="page" value="commentaires">
                <input id="action" type="hidden" name="action" value="delete">
                <input id="id" type="hidden" name="id" value="4">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-danger">Confirmer</button>
            </form>
        </div>
    </div>
</div>
<!-- /modal -->

<!-- end content  -->
<?php 
include 'includes/inc_main_bottombar.php'; 
include 'includes/inc_footer.php'; 
?>