<?php


// REGISTER CUSTOM POST TYPE

    function noun_post_type() { 
        register_post_type( 'noun', 
            array('labels' => array(
                'name' => 'Nouns',
                'singular_name' => 'Noun',
                'all_items' => 'All Nouns', 
                'add_new' => 'Add New', 
                'add_new_item' => 'Add New Noun',
                'edit' =>  'Edit', 
                'edit_item' => 'Edit Noun', 
                'new_item' => 'New Noun', 
                'view_item' => 'View Noun', 
                'search_items' => 'Search Nouns', 
                'not_found' => 'You haven\'t added any nouns yet!', 
                'not_found_in_trash' => 'There aren\'t any nouns in the trash.', 
                'parent_item_colon' => ''
                ),
            'description' =>  'The nouns making up ' . get_bloginfo('name') . '.',
            'public' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'query_var' => true,
            'menu_position' => 0.1,
            // 'menu_icon' => 'dashicons-book-alt', 
            // 'rewrite'    => array( 'slug' => 'noun', 'with_front' => false ), 
            'has_archive' => 'noun', 
            'capability_type' => 'post',
            'hierarchical' => true,
            'supports' => array( 'title', 'thumbnail', 'page-attributes')
            )
        );
        
    } 

    add_action( 'init', 'noun_post_type');
    
    
    
// UPDATE CUSTOM POST TYPE MESSAGES
    
    function codex_noun_updated_messages( $messages ) {
        global $post, $post_ID;

        $messages['noun'] = array(
            0 => '',
            1 => sprintf( 'Noun updated. <a href="%s">View Noun.</a>', esc_url( get_permalink($post_ID) ) ),
            2 => 'Custom field updated.',
            3 => 'Custom field deleted.',
            4 => 'Noun updated.',
            5 => isset($_GET['revision']) ? sprintf( 'Noun restored to revision from %s', wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
            6 => sprintf( 'Noun published. <a href="%s">View Noun.</a>', esc_url( get_permalink($post_ID) ) ),
            7 => 'Noun saved.',
            8 => sprintf( 'Noun submitted. <a target="_blank" href="%s">Preview Noun.</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
            9 => sprintf( 'Noun scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Noun.</a>', date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
            10 => sprintf( 'Noun draft updated. <a target="_blank" href="%s">Preview Noun.</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
        );

        return $messages;
    }
    add_filter( 'post_updated_messages', 'codex_noun_updated_messages' );    

?>