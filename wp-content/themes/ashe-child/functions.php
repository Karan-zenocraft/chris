<?php

function my_theme_enqueue_styles()
{

    $parent_style = 'parent-style';

    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array($parent_style),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(280, 210, true); // Normal post thumbnails
    add_image_size('screen-shot', 720, 540); // Full size screen
}

add_filter('excerpt_length', 'my_excerpt_length');

function my_excerpt_length($length)
{

    return 25;

}

add_filter('excerpt_more', 'new_excerpt_more');

function new_excerpt_more($text)
{

    return ' ';

}
function create_posttype()
{

    register_post_type('stories',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('Stories'),
                'singular_name' => __('Story'),
            ),
            'public' => true,
            'has_archive' => true,
            'hierarchical' => true,
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'revisions', 'page-attributes'),
            'rewrite' => array('slug' => 'stories'),
        )
    );
}
// Hooking up our function to theme setup
add_action('init', 'create_posttype');

add_action('pre_get_posts', 'wpsites_cpt_archive_items');
function wpsites_cpt_archive_items($query)
{
    if ($query->is_main_query() && !is_admin() && is_post_type_archive('stories')) {
        $query->set('meta_key', 'page_number');
        $query->set('orderby', 'page_number');
        $query->set('order', 'ASC');
        $query->set('posts_per_page', '2');
    }

}
