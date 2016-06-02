<?php while (have_posts()) : the_post(); ?>
    
    <?php get_template_part('templates/modules/hero-banner');?>

    <section id="section2" class="banner-fluid bg-white">
        <div class="content-wrapper">
            <article <?php post_class(); ?>>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
        </div>
    </section>

<?php endwhile; ?>
