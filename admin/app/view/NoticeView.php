<?php 
include 'includes/inc_header.php';
include 'includes/inc_main_sidebar.php';
include 'includes/inc_main_topbar.php';
?>
<!-- start content  -->
<div class="row notice">
    <div class="col-xs-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Accueil</h3> 
            </div>
        </div>
        <!-- end header -->
        <div class="row">
            <!-- start Admin -->
            <div class="col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                       <blockquote>
                            <p>
                                Bonjour <?=$_SESSION['user']->firstname()?>, bienvenue dans votre espace d'administration.<br/>
                                Que souhaitez-vous faire ?
                            </p>
                        </blockquote>
                        <br>
                        <p>
                    <?php 
                        if($_SESSION['user']->role() === 0) 
                        {
                            // Si l'utilisateur est un administrateur
                    ?>
                            Accéder à la liste des articles publiés, avec possibilité de modification, suppression, ou rédaction d'un nouvel article : <br/>
                            <a href="index.php?page=articles" class="btn btn-primary" style="margin-top:7px;">
                                <span class="fa fa-edit"></span>&nbsp; GÉRER LES ARTICLES
                            </a>
                            <br/><br/>
                            <b>Accéder aux catégories et sous-catégories des articles existants</b>, avec possibilité de modification, suppression, ou ajout d'une nouvelle catégorie / sous-catégorie :<br/>
                            <a href="index.php?page=categories" class="btn btn-primary" style="margin-top:7px;">
                                <span class="fa fa-list"></span>&nbsp; GÉRER LES CATÉGORIES & SOUS-CATÉGORIES
                            </a>
                            <br/><br/>
                            <b>Accéder aux mots-clés associés aux articles</b>, avec possibilité de modification, suppression, ou ajout de nouveaux tags :<br/>
                            <a href="index.php?page=tags" class="btn btn-primary" style="margin-top:7px;">
                                <span class="fa fa-tags"></span>&nbsp; GÉRER LES TAGS
                            </a>
                            <br/><br/>
                            <b>Accéder aux commentaires sur les articles</b>, avec possibilité de suppression ou de validation :<br/>
                            <a href="index.php?page=commentaires" class="btn btn-primary" style="margin-top:7px;">
                                <span class="fa fa-comment"></span>&nbsp; GÉRER LES COMMENTAIRES SUR VOS ARTICLES
                            </a>
                            <br/><br/>
                            <b>Accéder aux utilisateurs</b>, avec possibilité d'ajout d'un nouvel utilisateur, ou de modification / suppression d'un utilisateur existant :<br/>
                            <a href="index.php?page=users" class="btn btn-primary" style="margin-top:7px;">
                                <span class="fa fa-user"></span>&nbsp; GÉRER LES UTILISATEURS
                            </a>
                    <?php
                        }
                        else
                        {
                            // Si l'utilisateur n'est pas administrateur
                    ?>
                            <b>Accéder à la liste des articles que vous avez publiés</b>, avec possibilité de modification, suppression, ou rédaction d'un nouvel article : <br/>
                            <a href="index.php?page=articles" class="btn btn-primary" style="margin-top:7px;">
                                <span class="fa fa-edit"></span>&nbsp; GÉRER VOS ARTICLES
                            </a>
                            <br/><br/>
                            <b>Accéder aux mots-clés associés aux articles</b>, avec possibilité d'ajout de nouveaux tags :<br/>
                            <a href="index.php?page=tags" class="btn btn-primary" style="margin-top:7px;">
                                <span class="fa fa-tags"></span>&nbsp; AJOUTER DES TAGS
                            </a>
                            <br/><br/>
                            <b>Accéder aux commentaires sur vos articles</b>, avec possibilité de suppression ou de validation :<br/>
                            <a href="index.php?page=commentaires" class="btn btn-primary" style="margin-top:7px;">
                                <span class="fa fa-comment"></span>&nbsp; GÉRER LES COMMENTAIRES SUR VOS ARTICLES
                            </a>
                            <br/><br/>
                            <b>Modifiez vos informations personnelles</b> (nom, prénom, mot de passe, adresse email) :<br/>
                            <a href="index.php?page=users" class="btn btn-primary" style="margin-top:7px;">
                                <span class="fa fa-user"></span>&nbsp; GÉRER VOS INFORMATIONS PERSONNELLES
                            </a>
                    <?php
                        }
                    ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end content  -->
<?php 
include 'includes/inc_main_bottombar.php'; 
include 'includes/inc_footer.php'; 
?>