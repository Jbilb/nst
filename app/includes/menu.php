<div class="p-menu">
    <ul class="p-nav_menu_nav">
        <li class="<?php if($PAGE_name === "accueil") {echo 'active';} ?>">
            <a href="<?php echo $NAV_accueil; ?>" title="<?php echo $NAV_TITLE_accueil; ?>">ACCUEIL</a>
        </li>
        <li class="<?php if($PAGE_name === "page_histoire") {echo 'active';} ?>">
            <a href="<?php echo $NAV_page_histoire; ?>" title="<?php echo $NAV_TITLE_page_histoire; ?>">PAGE 2</a>
        </li>
        <li class="<?php if($PAGE_name === "page_carte") {echo 'active';} ?>">
            <a href="<?php echo $NAV_page_carte; ?>" title="<?php echo $NAV_TITLE_page_carte; ?>">PAGE 3</a>
        </li>
        <li class="<?php if($PAGE_name === "page_rejoindre") {echo 'active';} ?>">
            <a href="<?php echo $NAV_page_rejoindre; ?>" title="<?php echo $NAV_TITLE_page_rejoindre; ?>">PAGE 4</a>
        </li>
        <li class="<?php if($PAGE_name === "page5") {echo 'active';} ?>">
            <a href="<?php echo $NAV_page5; ?>" title="<?php echo $NAV_TITLE_page5; ?>">PAGE 5</a>
        </li>
        <li class="<?php if($PAGE_name === "page6") {echo 'active';} ?>">
            <a href="<?php echo $NAV_page6; ?>" title="<?php echo $NAV_TITLE_page6; ?>">PAGE 6</a>
        </li>
        <li class="<?php if($PAGE_name === "page7") {echo 'active';} ?>">
            <a href="<?php echo $NAV_page7; ?>" title="<?php echo $NAV_TITLE_page7; ?>">PAGE 7</a>
        </li>
        <li class="<?php if($PAGE_name === "template-ville") {echo 'active';} ?>">
            <a href="<?php echo $NAV_template-ville; ?>" title="<?php echo $NAV_TITLE_template-ville; ?>">PAGE 8</a>
        </li>
        <li class="<?php if($PAGE_name === "contact") {echo 'active';} ?>">
            <a href="<?php echo $NAV_contact; ?>" title="<?php echo $NAV_TITLE_contact; ?>">Contact</a>
        </li>
    </ul>
</div>