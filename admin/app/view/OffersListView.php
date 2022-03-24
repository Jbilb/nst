<?php 
include 'includes/inc_header.php';
include 'includes/inc_main_sidebar.php';
include 'includes/inc_main_topbar.php';
?>
<!-- start content  -->
<div class="row actualites">
    <!-- START OFFERS -->
    <div class="col-xs-12">
        <div class="page-title">
            <div class="title_left">
                <h3>F.A.Q.</h3>
            </div>
            <div class="title_right">
                <div class="col-md-8 col-sm-8 col-xs-12 form-group pull-right text-right"> 
                    <a href="offers/new/" class="btn btn-success">Ajouter une offre.</a>
                </div>
            </div>
        </div>
        <!-- end header -->
        <div class="row">
            <!-- start Admin -->
            <div class="col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <!-- start project list -->
                    <table class="table table-responsive table-striped projects">
                      <thead>
                        <tr>
                          <th>Nom</th>
                          <th>Publié</th>
                          <th>A la une</th>
                          <th>Description</th>
                          <th style="width: auto; text-align:right"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            if(!empty($offers_list))
                            {
                                foreach($offers_list as $offer)
                                {
                        ?>
                        <tr>
                          <td><strong><?=$offer->title()?></strong></td>
                          <td>
                              <?php 
                                  echo ($offer->is_published()) ? "<strong class='green'>Oui</strong>" : "<span>Non</span>";
                              ?>
                          </td>
                          <td>
                              <?php 
                                  echo ($offer->is_featured()) ? "<strong class='green'>Oui</strong>" : "<span>Non</span>";
                              ?>
                          </td>
                          <td><strong><?=$offer->description()?></strong></td>
                          <td style="text-align:right">
                           <form method="post" class="edition">
                                <a href="offers/edit/<?=$offer->id_offer()?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Modifier</a>
                                <button id="<?=$offer->id_offer()?>" class="btn btn-danger btn-xs delete-post" type="button" data-toggle="modal" data-target=".modal-delete"><i class="fa fa-trash-o"></i> Supprimer</button>
                            </form>
                          </td>
                        </tr>
                        
                        <?php 
                                }
                            }
                            else
                            {
                        ?>
                        <tr>
                            <td colspan="2">
                                <p class="center"><br/>Il n'y a pas encore de F.A.Q. enregistrées.</p>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                      </tbody>
                    </table>
                    <!-- end project list -->

                  </div>
                </div>
            </div>
        </div>
      </div>
      <!-- END OFFERS -->
     
</div>

<!-- modal -->
<div class="modal fade modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
                <h4 class="modal-title" id="myModalLabel2">EFFACER</h4> </div>
            <div class="modal-body">
                <h4>Supprimer cette offre ?</h4>
                <p>
                    Vous êtes sur le point de supprimer cette offre.<br/>
                    <strong>Cette opération est irréversible.</strong><br/>
                    Souhaitez-vous continuer ?
                </p>
            </div>
            <form class="modal-footer" method="get" action="index.php">
                <input id="page" type="hidden" name="page" value="offers">
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