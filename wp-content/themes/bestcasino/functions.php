<?php
/**
 * functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */


if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}


if (!defined('_THEME_URI')) {
    define('_THEME_URI', get_template_directory_uri());
}

if (!function_exists('st_theme_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function st_setup()
    {
        add_theme_support('post-thumbnails');

        register_nav_menus(
            array(
                'header-menu' => esc_html__('Header', 'psec-admin'),
                'footer-menu' => esc_html__('Footer', 'psec-admin'),
            )
        );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height' => 250,
                'width' => 250,
                'flex-width' => true,
                'flex-height' => true,
            )
        );

    }
endif;
add_action('after_setup_theme', 'st_setup');

/**
 * Enqueue scripts and styles.
 */
function st_scripts()
{
    wp_enqueue_style('normalize-style', _THEME_URI . '/assets/css/vendor/normalize.min.css', array());
    wp_enqueue_style('style', _THEME_URI . '/assets/css/styles.min.css', array(), _S_VERSION);

    wp_add_inline_script('jquery', 'var $ = jQuery.noConflict();');
    
    wp_register_script('main-js', _THEME_URI . '/assets/js/scripts.min.js',
        array(
            'jquery',
        ), _S_VERSION, $in_footer = true);
    

    wp_localize_script('main-js', 'ajax_url', array(
        admin_url('admin-ajax.php'),
        'themeUrl' => _THEME_URI,
    ));


    wp_enqueue_script('main-js');
}

add_action('wp_enqueue_scripts', 'st_scripts');

//Customize language switcher

/**
 * Custom post types.
 */
require get_template_directory() . '/inc/cpts.php';

/**
 * Helpers.
 */
require get_template_directory() . '/inc/helpers.php';

/**
 * Menus Customizations.
 */
require get_template_directory() . '/inc/menus.php';

require_once get_template_directory() . '/inc/posts-ajax.php';


/**
 * Disable auto-padding of p tags in WPCF7.
 */
add_filter('wpcf7_autop_or_not', '__return_false');

@ini_set('upload_max_size', '120M');
@ini_set('post_max_size', '120M');
@ini_set('max_execution_time', '300');
