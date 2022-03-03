<div class="c-form-sort masked" data-filter>
    <div class="c-form-sort_top">
        <div class="container">
            <div class="row flex align-center">
                <div class="col-xs-12 flex align-center justify-between">
                    <div class="c-form-sort_selectors flex nowrap">
                        <button class="c-form-sort__button" data-target="categories"
                            data-value="<?=($categorie_get) ? $categorie_get->slug() : ""?>">
                            <span class="text"
                                data-text><?=($categorie_get) ? $categorie_get->name() : "Catégories"?></span> <span
                                class="icon-arrow"></span>
                        </button>
                        <button class="c-form-sort__button" data-target="tags"
                            data-value="<?=($tag_get) ? $tag_get->slug() : ""?>">
                            <span class="text" data-text><?=($tag_get) ? $tag_get->name() : "Tags"?></span> <span
                                class="icon-arrow"></span>
                        </button>
                        <button class="c-form-sort__button c-form-sort__button--reset" data-reinit="true">
                            <span class="icon-mag-reinit"></span>
                        </button>
                    </div>
                    <h1 class="c-form-sort_title">Le magazine</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="c-form-sort_list" data-submenu="categories">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 flex">
                    <div class="flex c-form-sort_list_items">
                        <?php
                    foreach($categories_list as $categorie)
                    {
                        $class = ($categorie_get && $categorie_get->id_categorie() == $categorie->id_categorie()) ? "active" : "";
                        if($pageName === "mag") {
                ?>
                        <button data-switch data-slug="<?=$categorie->slug()?>" data-type="categories"
                            class="c-form-sort__button c-form-sort__button--small <?=$class?>">
                            <?=$categorie->name()?>
                        </button>
                        <?php } else {?>
                        <a href="<?=$NAV_mag.$categorie->slug()?>#main_content"
                            class="c-form-sort__button c-form-sort__button--small <?=$class?>">
                            <?=$categorie->name()?>
                        </a>
                        <?php
                        }
                    }
                ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="c-form-sort_list" data-submenu="tags">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <input type="text" class="c-form-sort__search" data-filter-tags placeholder="Filtrer les tags...">
                    <div data-tags-list class="flex c-form-sort_list_items">
                        <?php
                foreach($tags_list as $tag)
                {
                    $class = ($tag_get && $tag_get->id_tag() == $tag->id_tag()) ? "active" : "";

                    if($pageName === "mag") {
            ?>
                        <button data-switch data-slug="<?=$tag->slug()?>" data-type="tags"
                            class="c-form-sort__button c-form-sort__button--small <?=$class?>">
                            <?=$tag->name();?>
                        </button>
                        <?php } else {?>
                        <a href="<?=$NAV_mag.$tag->slug()?>#main_content"
                            class="c-form-sort__button c-form-sort__button--small <?=$class?>">
                            <?=$tag->name();?>
                        </a>
                        <?php
                        }
                }
            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>