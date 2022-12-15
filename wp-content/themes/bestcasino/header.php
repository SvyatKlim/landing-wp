<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until first section
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 *
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no"/>
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<div class="main-wrapper">
    <div class="header-overlay js-header-overlay"></div>
    <header class="header">
        <div class="header__container">
            <div class="header__logo">
                <?php
                if (get_custom_logo()) {
                    the_custom_logo();
                } else {?>
                    <p class="header__logo__text"><?php echo get_bloginfo(); ?></p>
                <?php } ?>
            </div>

            <div class="header__burger js-nav-btn">
                <div class="header__burger__wrapper">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <nav class="header__nav js-nav">
                <?php
                $args = array(
                    'walker' => new Header_Walker(),
                    'container' => false,
                    'menu_class' => 'header__nav__list js-nav-list',
                    'theme_location' => 'header-menu',
                    'fallback_cb' => false
                );

                wp_nav_menu($args);
                ?>

            </nav>
        </div>
    </header>
    <main class="main">