<form role="search" method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label for="s">
        <span class="screen-reader-text"><?php _x( 'Search for:', 'label', '_textdomain_' ); ?></span>
        <input type="search" class="search-field" placeholder="Search …" value="" name="s" id="s">
    </label>
    <input type="submit" class="search-submit" id="searchsubmit" value="<?php _e('Search', '_textdomain_'); ?>">
</form>