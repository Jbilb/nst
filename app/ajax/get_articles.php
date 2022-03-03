<?php
    // ========================================================
    // Inclusion du Main Controller
    // ======================================================== 
    
    include_once realpath(__DIR__ . '/..').'/includes/helper-mag.php';
    include_once realpath(__DIR__ . '/..').'/controller/MainController.php';


    $CategorieManager = new CategorieManager($db);
    $TagManager = new TagManager($db);
    $ArticleManager = new ArticleManager($db);
    
    // ========================================================
    // Récupération des articles publiés et tri par date (du + au - récent) ou par nombre de lectures
    // ========================================================  
    
    if(isset($_POST))
    {
        $categorie_get = $CategorieManager->getBySlug($_POST['slug_categorie']);
        $tag_get = $TagManager->getBySlug($_POST['slug_tag']);

        if(!$categorie_get && !$tag_get)
        {
            $articles_list = $ArticleManager->create_list(true);
        }
        elseif($categorie_get && $tag_get)
        {
            $articles_list = $ArticleManager->create_list(true,$categorie_get->id_categorie(),$tag_get->id_tag());
        }
        elseif($categorie_get && !$tag_get)
        {
            $articles_list = $ArticleManager->create_list(true,$categorie_get->id_categorie());
        }
        elseif(!$categorie_get && $tag_get)
        {
            $articles_list = $ArticleManager->create_list(true,false,$tag_get->id_tag());
        }
        
        if(!empty($articles_list))
        {
            foreach($articles_list as $article)
            {
    ?>
<div class="c-article c-article--card inactive" data-article data-date="<?=$article->date_publication()?>"
    data-reads="<?=$article->lectures()?>">
    <a href="<?=$NAV_mag_article?><?=$article->slug()?>">
        <figure class="c-article__img">
            <img src="<?=$article->cover_image()?>" alt="<?=$article->title()?>">
        </figure>
        <div class="c-article__infos">
            <div>
                <p class="c-article__date">
                    <?=$article->date_publication()?>
                </p>
                <p class="c-article__category">
                    <?=$CategorieManager->getName($article->id_categorie())?>
                </p>
                <h2 class="c-article__title"><?=$article->title()?></h2>
            </div>
            <div><button class="bouton bg0-white-brvert"><span>Lire la suite</span></button></div>
        </div>
    </a>
</div>
<?php
            }
        }
        else
        {
    ?>
<div class="col-xs-12">
    <p class="c-articles c-articles--no-articles">
        Aucun article disponible.
    </p>
</div>
<?php
        }        
    }
?>
<div class="col-xs-12 c-articles_see-more">
    <button class="c-articles_see-more_button bouton hidden" data-show-cards><span>Voir
            plus</span></button>
</div>