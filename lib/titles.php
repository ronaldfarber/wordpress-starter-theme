<?php

namespace Roots\Sage\Titles;


// PAGE TITLES

    function title() {
        if (is_home()) {
            if (get_option('page_for_posts', true)) {
                return get_the_title(get_option('page_for_posts', true));
            } else {
                return __('Latest Posts', '_textdomain_');
            }
        } elseif (is_archive()) {
            return get_the_archive_title();
        } elseif (is_search()) {
            return sprintf(__('Search Results for %s', '_textdomain_'), get_search_query());
        } elseif (is_404()) {
            return __('Not Found', '_textdomain_');
        } else {
            return get_the_title();
        }
    }