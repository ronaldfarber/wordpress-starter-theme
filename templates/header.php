<header id="mainHeader" class="header-content header-fixed-top">
    <div class="header-wrapper-fluid">

        <?php // Brand and toggle button grouped and visible on mobile ?>
        <div class="header-essentials">
            <button type="button" class="header-toggle-button collapsed" data-toggle="collapse" data-target="#primary-navigation" aria-expanded="false">
                <span class="sr-only"><?= __('Toggle navigation', '_textdomain_'); ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="header-branding-text">
                <a href="<?= esc_url(home_url('/')); ?>">
                    Starter Theme
                </a>
            </div>
        </div>

        <?php // Collect the nav links, forms, and other content for toggling on small screens ?>
        <div class="header-collapsable-content collapse" id="primary-navigation">
            <?php if (has_nav_menu('primary_navigation')) :?>
                <?php wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new Sage_Nav_Walker(), 'menu_class' => 'header-nav-links header-right']);?>
             <?php endif;?>
        </div>

    </div>
</header>