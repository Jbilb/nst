<aside class="container">
    <div class="row">
        <div class="col-xs-12 col-xl-10 col-xl-offset-1">
    <?php
        foreach($articles_featured_list as $featured)
        {
    ?>
            <a href="<?=$NAV_mag_article.$featured->slug()?>">
                <article class="c-article c-article--featured">
                    <div class="row flex align-stretch">
                        <div class="col-xs-12 col-sm-6 col-sm-push-6">
                            <div class="c-article__img">
                                <img src="<?=$featured->cover_image()?>" alt="<?=$featured->title()?>">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-sm-pull-6">
                            <div class="c-article__infos">
                                <p class="c-article__featured">
                                    A LA UNE
                                </p>
                                <p class="c-article__category">
                                    <?=$CategorieManager->getName($featured->id_categorie())?>
                                </p>
                                <h2 class="c-article__title"><?=$featured->title()?></h2>
                                <p class="c-article__date">
                                    <?=$featured->date_publication()?>
                                </p>
                                <p class="c-article__preview">
                                    <?=$tools->createPreview($featured->intro_text(),150)?>
                                </p>
                            </div>
                        </div>
                    </div>
                </article>
            </a>
    <?php
        }
    ?>
        </div>
    </div>
</aside>
<?php
    include 'includes/form-sort.php';
?>
<div class="mag_content" id="main_content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-xl-10 col-xl-offset-1">
                <h1 class="mag_content_title">
                    Nos articles
                </h1>
            </div>
            <div class="col-xs-12 col-xl-10 col-xl-offset-1">
                <div class="flex align-stretch c-articles_container" data-articles-container>
            <?php
                if(!empty($articles_list))
                {
                    foreach($articles_list as $article)
                    {
            ?>
                        <div class="c-article c-article--card" data-article data-date="<?=$article->date_publication()?>" data-reads="<?=$article->lectures()?>">
                            <a href="<?=$NAV_mag_article?><?=$article->slug()?>">
                                <figure class="c-article__img">
                                    <img src="<?=$article->cover_image()?>" alt="<?=$article->title()?>">
                                </figure>
                                <div class="c-article__infos">
                                    <p class="c-article__date">
                                        <?=$article->date_publication()?>
                                    </p>
                                    <p class="c-article__category">
                                        <?=$CategorieManager->getName($article->id_categorie())?>
                                    </p>
                                    <h2 class="c-article__title"><?=$article->title()?></h2>
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
            ?>
                    <div class="col-xs-12 c-articles_see-more">
                        <button class="c-articles_see-more_button hidden" data-show-cards>Voir plus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
