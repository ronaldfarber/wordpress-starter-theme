<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

    <?php get_template_part('templates/head'); ?>
    
    <body <?php body_class(); ?>>

        <?php do_action('get_header'); get_template_part('templates/header'); ?>

        <main class="page-wrapper" role="document">
        
            <?php include Wrapper\template_path(); ?>

        </main>

        <?php do_action('get_footer'); get_template_part('templates/footer'); ?>
        <?php wp_footer(); ?>

        <?php // If we are in the development environment, echo the current template name(s) to the console. ?>
        <?php if (WP_ENV == 'development'): ?>
            <script type="text/javascript">
                document.addEventListener("DOMContentLoaded", function(event) { 
                    <?php if (SageWrapping): ?>
                        console.log('Currently using the %c<?php echo basename(Wrapper\template_path());?>%c template with %c<?php Roots\Sage\Extras\get_current_template(true);?>%c as a theme wrapper.', 'font-weight:bold;', 'font-weight:normal;', 'font-weight:bold;', 'font-weight:normal;');
                    <?php else: ?>
                        console.log('Currently using the %c<?php Roots\Sage\Extras\get_current_template(true);?>%c template.', 'font-weight:bold;', 'font-weight:normal;');
                    <?php endif; ?>
                });
            </script>
        <?php endif; ?>
    
    </body>

</html>
