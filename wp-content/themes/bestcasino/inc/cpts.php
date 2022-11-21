<?php
/**
 * pdstartertheme Custom post types init file
 *
 * 
 */

// Change dashboard Posts to News
function post_to_news()
{
    $pt = get_post_type_object('post');
    $labels = $pt->labels;
    $labels->name = '';
    $labels->singular_name = __('News', 'psec-admin');
    $labels->new_item = __('News', 'psec-admin');
    $labels->view_item = 'View product';
    $labels->search_items = 'Search product';
    $labels->not_found = 'No news found';
    $labels->not_found_in_trash = 'No news found in Trash';
    $labels->all_items = __('News', 'psec-admin');
    $labels->menu_name = __('News', 'psec-admin');
    $labels->name_admin_bar = __('News', 'psec-admin');
    $pt->has_archive = 'news';
}

add_action('init', 'post_to_news');

function alter_taxonomy_for_post()
{
    unregister_taxonomy_for_object_type('category', 'post');
}

add_action('init', 'alter_taxonomy_for_post');


add_action('init', function () {
    register_taxonomy('post_tag', []);
});

// Register Custom Post Types
function pdst_register_custom_post_types()
{
    /*
     * Custom post types go here*/
    register_post_type('products',
        array(
            'labels' => array(
                'name' => __('Products', 'psec-admin'),
                'singular_name' => __('Products', 'psec-admin')
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'products'),
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
            'show_in_rest' => true,
            'supports' => ['title', 'thumbnail'],
        )
    );
    register_taxonomy('products-category', ['products'], [
        'labels' => [
            'name' => __('Product Categories', 'psec-admin'),
            'singular_name' => __('Product Categories', 'psec-admin'),
            'add_new' => __('Add new categories', 'psec-admin'),
            'add_new_item' => __('Add new item', 'psec-admin'),
        ],
        'show_in_rest' => true,
        'hierarchical' => true,
        'query_var' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'public' => true,
        "publicly_queryable" => true,
        'supports' => ['title'],
        'show_ui' => true,
    ]);


    register_post_type('certificates',
        array(
            'labels' => array(
                'name' => __('Certificate', 'psec-admin'),
                'singular_name' => __('Certificates', 'psec-admin')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'certificates'),
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
            'show_in_rest' => true,
            'supports' => ['title', 'thumbnail'],
        )
    );

    register_taxonomy('certificates-category', ['certificates'], [
        'labels' => [
            'name' => 'Certificates Categories',
            'singular_name' => 'Certificates Category',
            'add_new' => 'Add new category',
            'add_new_item' => 'Add new item',
        ],
        'show_in_rest' => true,
        'hierarchical' => true,
        'query_var' => true,
        'show_admin_column' => true,
        'public' => true,
        "publicly_queryable" => true,
        'supports' => ['title'],
        'show_ui' => true,
    ]);

    register_post_type('support',
        array(
            'labels' => array(
                'name' => __('Support', 'psec-admin'),
                'singular_name' => __('Support', 'psec-admin')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'support'),
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
            'show_in_rest' => true,
            'supports' => ['title', 'thumbnail'],
        )
    );

    register_taxonomy('support-category', ['support'], [
        'labels' => [
            'name' => 'Support Categories',
            'singular_name' => 'Support Categories',
            'add_new' => 'Add new categories',
            'add_new_item' => 'Add new item',
        ],
        'show_in_rest' => true,
        'hierarchical' => true,
        'query_var' => true,
        'show_admin_column' => true,
        'public' => true,
        "publicly_queryable" => false,
        'supports' => ['title'],
        'show_ui' => true,
    ]);

    register_post_type('soft',
        array(
            'labels' => array(
                'name' => __('Soft', 'psec-admin'),
                'singular_name' => __('Soft', 'psec-admin')
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'soft'),
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
            'show_in_rest' => true,
            'supports' => ['title', 'editor'],
        )
    );

    register_post_type('modal',
        array(
            'labels' => array(
                'name' => __('Modals', 'psec-admin'),
                'singular_name' => __('Modal', 'psec-admin')
            ),
            'public' => true,
            'has_archive' => false,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
            'show_in_rest' => true,
            'supports' => ['title'],
            'publicly_queryable' => false
        )
    );

    register_post_type('files',
        array(
            'labels' => array(
                'name' => __('Files', 'psec-admin'),
                'singular_name' => __('Files', 'psec-admin')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'files'),
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
            'show_in_rest' => true,
            'supports' => ['title'],
        )
    );

    register_taxonomy('files-category', ['files'], [
        'labels' => [
            'name' => 'Files Categories',
            'singular_name' => 'Files Category',
            'add_new' => 'Add new category',
            'add_new_item' => 'Add new item',
        ],
        'show_in_rest' => true,
        'hierarchical' => true,
        'query_var' => true,
        'show_admin_column' => true,
        'public' => true,
        "publicly_queryable" => false,
        'supports' => ['title'],
        'show_ui' => true,
    ]);
}

add_action('init', 'pdst_register_custom_post_types', 0);
