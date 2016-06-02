<?php while (have_posts()) : the_post(); ?>
    <section class="panel-wrapper single-post">
        <div class="content-wrapper-fluid">
            <article <?php post_class(); ?>>
                <header>
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
                <footer>
                    <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', '_textdomain_'), 'after' => '</p></nav>']); ?>
                </footer>
                <?php comments_template('/templates/comments.php'); ?>
            </article>

            <?php include(locate_template('templates/sidebar.php'));?>
        </div>
    </section>
<?php endwhile; ?>
