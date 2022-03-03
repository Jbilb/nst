<?php
    include 'includes/form-sort.php';
?>
<div class="mag_content" id="main_content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="flex align-stretch c-articles_container" data-articles-container>
                    <?php
                if(!empty($articles_list))
                {
                    foreach($articles_list as $article)
                    {
            ?>
                    <div class="c-article c-article--card" data-article data-date="<?=$article->date_publication()?>"
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
            ?>
                    <div class="col-xs-12 c-articles_see-more">
                        <button class="c-articles_see-more_button bouton hidden" data-show-cards><span>Voir
                                plus</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>