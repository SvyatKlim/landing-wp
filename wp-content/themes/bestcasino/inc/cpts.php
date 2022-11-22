<?php
/**
 *  Custom post types init file
 * 
 */

function register_custom_post_types()
{
    /*
     * Custom post types go here*/

    register_post_type('casino',
        array(
            'labels' => array(
                'name' => __('Casino', 'bcasino'),
                'singular_name' => __('Casinos', 'bcasino')
            ),
            'public' => true,
            'has_archive' => false,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
            'show_in_rest' => true,
            'supports' => ['title', 'thumbnail'],
            "publicly_queryable" => false,
        )
    );

    register_taxonomy('casino-cat', ['casino'], [
        'labels' => [
            'name' => 'Casino Categories',
            'singular_name' => 'Casino Category',
            'add_new' => 'Add new category',
            'add_new_item' => 'Add new item',
        ],
        'show_in_rest' => true,
        'hierarchical' => true,
        'query_var' => true,
        'show_admin_column' => true,
        'public' => true,
        "publicly_queryable" => false,
        'show_ui' => true,
    ]);

    register_taxonomy('casino-tag', ['casino'], [
        'labels' => [
            'name' => 'Tags',
            'singular_name' => 'Tag',
            'add_new' => 'Add new tag',
            'add_new_item' => 'Add new item',
        ],
        'show_in_rest' => true,
        'hierarchical' => false,
        'query_var' => true,
        'show_admin_column' => true,
        'public' => true,
        "publicly_queryable" => false,
        'show_ui' => true,
    ]);
}

add_action('init', 'register_custom_post_types', 0);