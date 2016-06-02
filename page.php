<?php while (have_posts()) : the_post(); ?>
    <?php include(locate_template('templates/modules/hero-banner.php'));?>
    <?php the_content(); ?>
<?php endwhile; ?>
