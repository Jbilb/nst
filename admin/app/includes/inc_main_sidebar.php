 <body class="nav-md">
    <div class="container body">
      <div class="main_container">
         <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
             <div class="wrapper-img">
                 <img src="<?php echo $site->srcimg(); ?>" alt="..." class="">
             </div>
              <a href="index.php" class=""><span><?php echo $site->name(); ?></span></a>
            </div>
            <div class="clearfix"></div>
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  
                 <?php 
                    if($_SESSION['user']->role() === 0)
                    {
                ?>
                    <li class="<?=(!isset($_GET['page'])) ? "current-page" : ""; ?>">
                        <a href=""><i class="fa fa-desktop"></i> Accueil</a>
                    </li>           
                    <li class="<?=(isset($_GET['page']) && $_GET['page'] == "articles") ? "current-page" : "";?>">
                        <a href="articles/"><i class="fa fa-pencil-square"></i> Articles </a>
                    </li>  
                    <li class="<?=(isset($_GET['page']) && $_GET['page'] == "categories") ? "current-page" : "";?>">
                        <a href="categories/"><i class="fa fa-list"></i> Catégories d'articles</a>
                    </li>         
                    <li class="<?=(isset($_GET['page']) && $_GET['page'] == "tags") ? "current-page" : "";?>">
                        <a href="tags/"><i class="fa fa-tags"></i> Tags </a>
                    </li>
                    <br/><br/>
                    <li class="<?=(isset($_GET['page']) && $_GET['page'] == "menu") ? "current-page" : "";?>">
                        <a href="menu/"><i class="fa fa-book"></i> Le Menu </a>
                    </li>
                    <li class="<?=(isset($_GET['page']) && $_GET['page'] == "categories-menu") ? "current-page" : "";?>">
                        <a href="categories-menu/"><i class="fa fa-list"></i> Catégories de menu </a>
                    </li>     
                    <li class="<?=(isset($_GET['page']) && $_GET['page'] == "plats") ? "current-page" : "";?>">
                        <a href="plats/"><i class="fa fa-flask"></i> Plats </a>
                    </li>
                    <br/><br/>
                    <li class="<?=(isset($_GET['page']) && $_GET['page'] == "users") ? "current-page" : "";?>">
                        <a href="users/"><i class="fa fa-user"></i> Utilisateurs</a>
                    </li>
                    <li class="<?=(isset($_GET['page']) && $_GET['page'] == "settings") ? "current-page" : "";?>">
                        <a href="settings/"><i class="fa fa-cog"></i> Configuration</a>
                    </li>
                 <?php 
                    }
                    else
                    {
                 ?>
                    <li>
                        <a href="index.php"><i class="fa fa-desktop"></i> Accueil</a>
                    </li>           
                    <li>
                        <a href="index.php?page=articles"><i class="fa fa-pencil-square"></i> Mes articles</a>
                    </li>           
                    <li>
                        <a href="index.php?page=tags"><i class="fa fa-tags"></i> Tags</a>
                    </li>
                    <li <?php if($new_com) {echo "class='new_com'";}?>>
                        <a href="index.php?page=commentaires"><i class="fa fa-comment"></i> Commentaires </a>
                    </li>
                    <br/><br/>
                    <li>
                        <a href="index.php?page=users"><i class="fa fa-user"></i> Mon profil</a>
                    </li>
                 <?php
                    }
                 ?>
                </ul>
              </div>
            </div>
          </div>
        </div>