<?php

// Current Year

    function current_year_shortcode( $atts ){
        return date("Y");
    }

    add_shortcode( 'current_year', 'current_year_shortcode' );

?>